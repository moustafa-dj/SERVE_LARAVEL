<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\InterventionContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
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
        $interventions = $this->intervention->getAll();

        return view('admin.intervention.index',compact('interventions'));
    }

    public function show($id): Renderable
    {
        $intervention = $this->intervention->findById($id);

        return view('admin.intervention.show' , compact('intervention'));
    }

    public function confirmIntervention($id): RedirectResponse
    {
        $this->intervention->confirm($id);
        
        return redirect()->back();
    }

    public function detachEmployee($employee_id , $id): RedirectResponse
    {
        $this->intervention->detachEmployee($id,$employee_id);

        return redirect()->back();
    }

    public function detachEquipment($equipment_id , $id): RedirectResponse
    {
        $this->intervention->detachEquipment($id,$equipment_id);
        
        return redirect()->back();
    }
}
