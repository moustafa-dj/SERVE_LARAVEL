<?php

namespace App\Http\Controllers\web\employee;

use App\Contracts\InterventionContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    protected InterventionContract $intervention;

    public function __construct(InterventionContract $intervention)
    {
        $this->intervention = $intervention;
    }

    public function index(): Renderable
    {
        
        return view('employee.intervention.index');
    }
}
