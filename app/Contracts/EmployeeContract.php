<?php

namespace App\Contracts;

interface EmployeeContract extends BaseContract{
    
    public function updatePass($id , $data);
    public function generateResume($employee);
    public function acceptApplication($employee);
    public function refuseApplication($employee);
}