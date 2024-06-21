<?php

namespace App\Http\Controllers\web\employee;

use App\Contracts\EmployeeContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\updateEmployeePassRequest;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class ProfileContollrt extends Controller
{
    protected EmployeeContract $employee;

    public function __construct(EmployeeContract $employee)
    {
        $this->employee = $employee;
    }

    public function index(): Renderable
    {
        $id = auth()->user()->id;

        $employee = $this->employee->findById($id);

        return view('employee.profile.index' , compact('employee'));
    }

    public function updatePass(updateEmployeePassRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $id = auth()->user()->id;

        $this->employee->updatePass($id , $data);

        return redirect()->back();
    }

    public function update(EmployeeRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $id = auth()->user()->id;

        $this->employee->update($id , $data);

        return redirect()->back();
    }
}
