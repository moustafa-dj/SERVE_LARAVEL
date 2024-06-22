<?php

namespace App\Repositories;

use App\Contracts\EmployeeContract;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository extends BaseRepository implements EmployeeContract {

    protected Employee $employee;

    public function __construct(Employee $employee)
    {
        parent::__construct($employee);
    }

    public function create(array $data)
    {

    }

    public function update($employee , array $data)
    {
        $employee = $this->findById($employee);

        $employee->update($data);
    }

    public function destroy($id)
    {

    }

    public function updatePass($employee , $data){

        $employee = $this->findById($employee);

        $employee->password = Hash::make($data["password"]);
        
        $employee->save();
    }

}