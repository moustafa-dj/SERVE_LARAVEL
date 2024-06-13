<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\DomainContract;
use App\Contracts\ServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected ServiceContract $service;
    protected DomainContract $domain;

    public function __construct(
        ServiceContract $service ,
        DomainContract $domain
    )
    {
        $this->service = $service;
        $this->domain = $domain;
    }

    public function index(): Renderable
    {
        $services = $this->service->getAll();
        
        return view('admin.service.index',compact('services'));
    }

    public function create(){

        $domains = $this->domain->getAll();

        return view('admin.service.create' , compact('domains'));
    }

    public function store(ServiceRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->service->create($data);

        return redirect()->route('services.index');
    }

    public function edit($id): Renderable
    {
        $service = $this->service->findById($id);

        $domains = $this->domain->getAll();

        return view('admin.service.edit' , compact('service','domains'));
    }

    public function update($id , ServiceRequest $request){

        $data = $request->validated();

        $service = $this->service->findById($id);

        $this->service->update($service , $data);

        return redirect()->route('services.index');

    }

    public function show($id){

        $service = $this->service->findById($id);

        return view('admin.service.show' , compact('service'));
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->destroy($id);

        return redirect()->route('services.index');
    }
}
