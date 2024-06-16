<?php

namespace App\Repositories;

use App\Contracts\ClientContract;
use App\Models\User;

class ClientRepository implements ClientContract {

    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getAll(){
        
        return $this->model->all();
    }
    public function findByAttribute(){}

    public function create(array $data)
    {

    }

    public function update($model , array $data)
    {

    }

    public function destroy($id)
    {

    }

}