<?php

namespace App\Http\Controllers;

use App\Contracts\ServiceContract;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected ServiceContract $service;
    public function __construct(ServiceContract $service)
    {
        $this->service = $service;
    }
    public function index(): Renderable
    {
        $services = $this->service->getAll();
        
        return view('welcome' , compact('services'));
    }

    public function getServiceDetails($id): Renderable
    {
        $service = $this->service->findById($id);

        return view('pages.service-details' , compact('service'));
    }
}
