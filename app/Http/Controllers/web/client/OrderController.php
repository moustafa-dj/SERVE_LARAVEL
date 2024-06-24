<?php

namespace App\Http\Controllers\web\client;

use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderMakeRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected OrderContract $order;

    public function __construct(OrderContract $order)
    {
        $this->order = $order;
    }

    public function store(OrderMakeRequest $request){
        
        $data = $request->validated();

        $this->order->create($data);

        return redirect()->back();
    }
}
