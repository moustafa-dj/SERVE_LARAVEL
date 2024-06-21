<?php

namespace App\Http\Controllers\web\employee\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRegisterRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Domain;
use App\Services\FileUploadService;

class AuthController extends Controller
{
    public function registerForm():Renderable
    {
        $domains = Domain::all();

        return view('employee.auth.register' , compact('domains'));
    }

    public function register(
        EmployeeRegisterRequest $request,
        FileUploadService $service,
    ): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('resume')) {
            $data['resume'] = $service->uploadEmployeeResume($data);
        }
    
        $employee = Employee::create($data);

        if($employee){

            $employee->assignRole('employee');

            Auth::login($employee);

            return redirect('/');
        }
        return redirect()->back();
    }
    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect('/');
    }

}
