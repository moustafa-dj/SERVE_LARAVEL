<?php

namespace App\Contracts;

use App\Http\Requests\InterventionRequest;

interface OrderContract extends BaseContract{

    public function cancele($id);
    public function accept($id);
    public function refuse($id);
}