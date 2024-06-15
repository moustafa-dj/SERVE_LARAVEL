<?php

namespace App\Http\Controllers\web\client\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\WithoutErrorHandler;

class AuthController extends Controller
{
    
    public function loginForm(): Renderable
    {
        return view('client.auth.login');
    }
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email'  => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email','password');
        $user = User::where('email' , $credentials['email'])->first();

        if(!$user){
            return back()->withErrors([
                'email' => 'The provided email does not exist in our records.'
            ]);
        }

        if(Auth::guard('web')->attempt($credentials)){
            return redirect()->route('/');
        }
        return  back()->withErrors([
            'password' => 'The provided password is incorrect.'
        ]);
    }

    public function registerForm():Renderable
    {
        return view('client.auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email'  => 'required|email',
            'password' => 'required|min:6'
        ]);

        $client = User::create($data);
        if($client){
            Auth::login($client);
            return redirect();
        }
        return redirect()->back();
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
