<?php

namespace App\Repositories;

use App\Contracts\EmployeeContract;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository implements EmployeeContract {

    protected Employee $model;

    public function __construct(Employee $model)
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
        $employee = $this->findById($model);

        $employee->update($data);
    }

    public function destroy($id)
    {

    }

    public function updatePass($model , $data){

        $employee = $this->findById($model);

        $employee->password = Hash::make($data["password"]);
        
        $employee->save();
    }

}