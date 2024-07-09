<?php

namespace App\Contracts;

interface EmployeeContract extends BaseContract{
    
    public function updatePass($id , $data);
}