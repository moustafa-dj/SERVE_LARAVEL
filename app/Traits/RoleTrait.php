<?php

namespace App\Traits;

trait RoleTrait
{
    public function isClient(){
        return $this->roles()->where('name', 'client')->first();
    }
    public function isEmployee(){
        return $this->roles()->where('name', 'employee')->first();
    }

}
