<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\EmployeeContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected EmployeeContract $employee;

    public function __construct(EmployeeContract $employee)
    {
        $this->employee = $employee;
    }

    public function index(): Renderable
    {
        return view('admin.application.index');
    }
}
