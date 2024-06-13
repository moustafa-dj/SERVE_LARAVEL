<?php

namespace App\Http\Controllers\web\Admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function index() : Renderable
    {
        return view('Admin.auth.login');
    }

    public function login(Request $request) : RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email' , 'password');

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        Auth::Guard('admin')->logout();
        return redirect()->route('admin.login-admin');
    }
}
