<?php

namespace App\Contracts\Strategies;

interface LoginStrategieContract{

    public function login(array $credentials);
}