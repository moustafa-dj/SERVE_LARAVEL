<?php

namespace App\Http\Controllers\web\employee\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Enums\Employee\Status;
use Illuminate\Validation\Rule;
use App\Models\Domain;

class AuthController extends Controller
{
    public function registerForm():Renderable
    {
        $domains = Domain::all();
        return view('employee.auth.register' , compact('domains'));
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'adress'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'domain_id'=> 'required|exists:domains , id',
            'resume' => 'required|mimes:pdf|max:10000',
        ]);

        $employee = Employee::create($data);

        if($employee){
            $employee->assignRole('employee');
            Auth::login($employee);
            return redirect('/');
        }
        return redirect()->back();
    }

}
