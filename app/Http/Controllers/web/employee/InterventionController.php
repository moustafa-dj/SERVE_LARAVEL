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
        $interventions = $this->intervention->setScope('ByEmployee',auth()->user()->id)->withRelations(['equipments'])->getAll();

        return view('employee.intervention.index',compact('interventions'));
    }

    public function show($id): Renderable
    {
        $intervention = $this->intervention
                        ->withRelations(['employees'])
                        ->findById($id);
        return view('employee.intervention.show',compact('intervention'));
    }

    public function engage($intervention_id , $employee_id): RedirectResponse
    {
        $this->intervention->engage($employee_id,$intervention_id);

        return redirect()->back();
    }

    public function decline($intervention_id , $employee_id): RedirectResponse
    {
        $this->intervention->decline($employee_id,$intervention_id);

        return redirect()->back();
    }
}
