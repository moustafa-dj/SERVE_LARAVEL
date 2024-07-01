<?php

namespace App\Http\Controllers;

use App\Contracts\Strategies\LoginStrategieContract;
use App\Services\Strategies\LoginStrategieContext;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected LoginStrategieContext $loginStrategie;

    public function __construct(LoginStrategieContext $loginStrategie) {
        $this->loginStrategie = $loginStrategie;
    }

    public function login(Request $request){

        $request->validate([
            'email'  => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email','password');

        $user = $this->loginStrategie->login($credentials);

        if ($user) {
            return redirect('/');
        }

        return redirect()->back()->withErrors(['message' => 'Login failed.']);
    }
}
