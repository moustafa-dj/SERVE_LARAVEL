<?php

namespace App\Services\Strategies;

use App\Contracts\Strategies\LoginStrategieContract;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClientLoginStrategie implements LoginStrategieContract{

    public function login($credentials){
        $user = User::where('email' , $credentials['email'])->first();
        $errors = [];

        if(!$user){
            $errors["email"] = 'The provided email does not exist in our records.';
            return $errors;
        }

        if(Auth::guard('web')->attempt($credentials)){
           return Auth::guard('web')->user();
        }
    }

}