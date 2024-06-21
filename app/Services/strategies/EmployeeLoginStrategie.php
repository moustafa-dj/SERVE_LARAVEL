<?php

namespace App\Services\Strategies;

use App\Contracts\Strategies\LoginStrategieContract;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class EmployeeLoginStrategie implements LoginStrategieContract{

    public function login($credentials){
        $employee = Employee::where('email' , $credentials['email'])->first();
        $errors = [];

        if(!$employee){
            $errors["email"] = 'The provided email does not exist in our records.';
            return $errors;
        }

        if(Auth::guard('employee')->attempt($credentials)){
           return Auth::guard('employee')->user();
        }
    }

}