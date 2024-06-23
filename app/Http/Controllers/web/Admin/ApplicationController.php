<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\EmployeeContract;
use App\Enums\Employee\Status;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
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
        $applications = $this->employee->findByAttribute(['status' => Status::PENDING]);

        return view('admin.application.index' , compact('applications'));
    }

    public function show($id): Renderable
    {
        $application = $this->employee->findById($id);

        return view('admin.application.show' , compact('application'));
    }

    public function dawnloadResume($id)
    {
        return $this->employee->generateResume($id);
    }

    public function acceptApplication($id): RedirectResponse
    {
        $this->employee->acceptApplication($id);

        return redirect()->back();
    }

    public function refuseApplication($id): RedirectResponse
    {
        $this->employee->refuseApplication($id);

        return redirect()->back();
    }
}
