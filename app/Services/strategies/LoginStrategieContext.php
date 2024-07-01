<?php

namespace App\Services\Strategies;

use App\Contracts\Strategies\LoginStrategieContract;

class LoginStrategieContext {

    private  $strategie;

    public function setStrategie(LoginStrategieContract $strategie)
    {
        $this->strategie = $strategie;
    }

    public function login($credentials){
        return $this->strategie->login($credentials);
    }
}