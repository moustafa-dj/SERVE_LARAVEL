<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\EquipmentContract;
use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use App\http\Requests\EquipmentRequest;

class EquipmentController extends Controller
{
    protected EquipmentContract $equipment;

    public function __construct(EquipmentContract $equipment)
    {
        $this->equipment = $equipment;
    }

    public function index(): Renderable
    {
        $equipments = $this->equipment->getAll();

        return view('admin.equipment.index' , compact('equipments'));
    }

    public function create(): Renderable
    {
        return view('admin.equipment.create');
    }

    public function store(EquipmentRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->equipment->create($data);

        return redirect()->route('equipments.index');
    }

    public function edit($id): Renderable
    {
        $equipment = $this->equipment->findById($id);

        return view('admin.equipment.edit' , compact('equipment'));
    }

    public function update($id , EquipmentRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $equipment = $this->equipment->findById($id);

        $this->equipment->update($equipment->id , $data);

        return redirect()->route('equipments.show');
    }
    
    public function show($id): Renderable
    {
        $equipment = $this->equipment->findById($id);

        return view('admin.equipment.show' , compact('equipment'));
    }

    public function destroy($id): RedirectResponse
    {
        $this->equipment->destroy($id);

        return redirect()->route('equipments.index');
    }
}
