<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\EmployeeContract;
use App\Contracts\EquipmentContract;
use App\Contracts\InterventionContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\InterventionRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    protected InterventionContract $intervention;
    protected EmployeeContract $employee;
    protected EquipmentContract $equipment;

    public function __construct(
        InterventionContract $intervention,
        EmployeeContract $employee,
        EquipmentContract $equipment,
    )
    {
        $this->intervention = $intervention;
        $this->employee = $employee;
        $this->equipment = $equipment;
    }

    public function index(): Renderable
    {
        $interventions = $this->intervention->getAll();

        return view('admin.intervention.index',compact('interventions'));
    }

    public function edit($id) : Renderable
    {
        $intervention = $this->intervention->findById($id);

        $employees = $this->employee->getAll();

        $equipments = $this->equipment->getAll();

        return view('admin.intervention.edit' , compact('intervention' , 'employees','equipments'));
    }

    public function update($id , InterventionRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->intervention->update($id,$data);

        return redirect()->back();
    }

    public function show($id): Renderable
    {
        $intervention = $this->intervention->findById($id);

        return view('admin.intervention.show' , compact('intervention'));
    }

    public function confirmIntervention($id): RedirectResponse
    {
        $this->intervention->confirm($id);
        
        return redirect()->back();
    }

    public function detachEmployee($employee_id , $id): RedirectResponse
    {
        $this->intervention->detachEmployee($id,$employee_id);

        return redirect()->back();
    }

    public function detachEquipment($equipment_id , $id): RedirectResponse
    {
        $this->intervention->detachEquipment($id,$equipment_id);
        
        return redirect()->back();
    }
}
