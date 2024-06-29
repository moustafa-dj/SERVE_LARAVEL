<?php

namespace App\Repositories;

use App\Contracts\EmployeeContract;
use App\Contracts\OrderContract;
use App\Enums\Order\Status;
use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderContract {

    protected Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;

        parent::__construct($order);
    }

    public function create(array $data)
    {
        $data["order_date"] = now()->toDateString();

        $this->order->create($data);
    }

    public function update($order , array $data)
    {
        $order = $this->findById($order);

        $order->update($data);
    }

    public function destroy($id)
    {
        $order = $this->findById($id);

        $order->delete();
    }

    public function accept($order){

        $order = $this->findById($order);

        $order->status = Status::ACCEPTED;

        $order->save();
    }
    
    public function refuse($order){

        $order = $this->findById($order);

        $order->status = Status::REFUSED;

        $order->save();
    }


}