<?php

namespace App\Http\Controllers\web\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\OrderContract;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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
}
