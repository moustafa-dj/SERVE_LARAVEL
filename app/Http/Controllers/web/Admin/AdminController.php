<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\AdminContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected AdminContract $admin;

    public function __construct(AdminContract $admin)
    {
        $this->admin = $admin;
    }

    public function index(): Renderable
    {
        return view('Admin.layouts.admin');
    }

    public function renderProfile() :Renderable
    {
        $admin = $this->admin->findById(auth()->user()->id);

        return view('Admin.profile.profile' , compact('admin'));
    }

    public function update(AdminRequest $request){

        $id = auth()->user()->id;

        $data = $request->validated();

        $this->admin->update($id,$data);

        return redirect()->back();
    }
}
