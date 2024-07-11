<?php

namespace App\Http\Controllers\web\client;

use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderMakeRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected OrderContract $order;

    public function __construct(OrderContract $order)
    {
        $this->order = $order;
    }

    public function index(): Renderable
    {
        $orders = $this->order->setScope('ByClient',auth()->user()->id)->withRelations(['service'])->getAll();

        return view('client.order.index' ,compact('orders'));
    }

    public function show($id) : Renderable
    {
        $order = $this->order->findById($id);

        return view('client.order.show' , compact('order'));
    }

    public function store(OrderMakeRequest $request){
        
        $data = $request->validated();

        $this->order->create($data);

        return redirect()->back();
    }

    public function canceleOrder($id): RedirectResponse
    {
        $this->order->cancele($id);

        return redirect()->back();
    }
}
