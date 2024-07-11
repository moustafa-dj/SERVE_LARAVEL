<?php

namespace App\Contracts;

interface AdminContract extends BaseContract{

    public function removeImg($model);
    public function updatePass($model , $data);
}