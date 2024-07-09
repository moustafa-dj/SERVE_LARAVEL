<?php

namespace App\Http\Controllers\web\employee;

use App\Contracts\EmployeeContract;
use App\Contracts\InterventionContract;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    protected InterventionContract $intervention;
    protected EmployeeContract $employee;

    public function __construct(InterventionContract $intervention , EmployeeContract $employee)
    {
        $this->intervention = $intervention;
        $this->employee = $employee;
    }

    public function index(): Renderable
    {
        $employee = $this->employee->findById(auth()->user()->id);

        return view('employee.intervention.index',compact('employee'));
    }

    public function show($id): Renderable
    {
        $intervention = $this->intervention
                        ->withRelations(['employees'])
                        ->setScope('byEmployee', $id)
                        ->findById($id);

        return view('employee.intervention.show',compact('intervention'));
    }

    public function engage($intervention_id , $employee_id): RedirectResponse
    {
        $this->intervention->engage($intervention_id , $employee_id);

        return redirect()->back();
    }
}
