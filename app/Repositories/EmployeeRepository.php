<?php

namespace App\Repositories;

use App\Contracts\EmployeeContract;
use App\Enums\Employee\Status;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $employee = $this->findById($id);

        $employee->delete();
    }

    public function updatePass($employee , $data){

        $employee = $this->findById($employee);

        $employee->password = Hash::make($data["password"]);
        
        $employee->save();
    }

    public function generateResume($employee){

        $employee = $this->findById($employee);

        $file = Storage::disk('resumes')->path($employee->resume);

        return response()->download($file);
    }

    public function acceptApplication($employee){

        $employee = $this->findById($employee);

        $employee->status = Status::ACCEPTED;

        $employee->save();
    }

    public function refuseApplication($employee){

        $employee = $this->findById($employee);

        $employee->status = Status::REFUSED;

        $employee->save();
    }


}