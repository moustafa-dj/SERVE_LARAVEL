<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\EmployeeContract;
use App\Contracts\EquipmentContract;
use App\Contracts\InterventionContract;
use App\Http\Controllers\Controller;
use App\Contracts\OrderContract;
use App\Http\Requests\InterventionRequest;
use App\Models\Employee;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class OrderController extends Controller
{
    protected OrderContract $order;

    protected EmployeeContract $employee;

    protected EquipmentContract $equipment;

    protected InterventionContract $intervention;

    public function __construct(
        OrderContract $order,
        EmployeeContract $employee,
        EquipmentContract $equipment,
        InterventionContract $intervention
        )
    {
        $this->order = $order;
        $this->employee = $employee;
        $this->equipment = $equipment;
        $this->intervention = $intervention;
    }

    public function index() : Renderable
    {
        $orders = $this->order->getAll();

        return view('Admin.order.index' , compact('orders'));
    }

    public function show($id) : Renderable
    {
        $order = $this->order->findById($id);

        return view('admin.order.show' , compact('order'));
    }

    public function processOrder($id) : Renderable
    {
        $order = $this->order->findById($id);

        $employees = $this->employee->getAll();

        $equipments = $this->equipment->getAll();

        return view('admin.order.process',compact('order','employees','equipments'));
    }

    public function acceptOrder(InterventionRequest $request,$id): RedirectResponse
    {
        $data = $request->validated();

        $this->order->accept($id);

        $data['order_id'] = $id;

        $this->intervention->create($data);

        return redirect()->back();
    }


    public function refuseOrder($id): RedirectResponse
    {
        $this->order->refuse($id);

        return redirect()->back();
    }
}
