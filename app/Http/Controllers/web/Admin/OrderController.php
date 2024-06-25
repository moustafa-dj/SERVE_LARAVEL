<?php

namespace App\Http\Controllers\web\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\OrderContract;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class OrderController extends Controller
{
    protected OrderContract $order;

    public function __construct(OrderContract $order)
    {
        $this->order = $order;
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

    public function refuseOrder($id): RedirectResponse
    {
        $this->order->refuse($id);

        return redirect()->back();
    }
}
