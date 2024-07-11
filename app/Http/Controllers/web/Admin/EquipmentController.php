<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\EquipmentContract;
use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use App\http\Requests\EquipmentRequest;
use GuzzleHttp\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class EquipmentController extends Controller
{
    protected EquipmentContract $equipment;

    public function __construct(EquipmentContract $equipment)
    {
        $this->equipment = $equipment;
    }

    public static function middleware():array
    {
        return [
            'role_or_permission:admin',
            new Middleware(PermissionMiddleware::using(
                'view-list'), only:['index']),

            new Middleware(
                PermissionMiddleware::class . ':view',
                ['only' => ['show']]
            ),

            new Middleware(
                PermissionMiddleware::class . ':create',
                ['only' => ['create','store']]
            ),

            new Middleware(
                PermissionMiddleware::class . ':edit',
                ['only' => ['edit','update']]
            ),
            
            new Middleware(
                PermissionMiddleware::class . ':delete',
                ['only' =>'destroy']
            ),
        ];
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

        return redirect()->route('equipments.show' , $equipment->id);
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
