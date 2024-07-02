<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request){

        $request->validate([
            'email'  => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email','password');

        $user = User::where('email',$credentials['email'])->first();

        if($user){
            if($user->isClient()){
                if(Auth::guard('web')->attempt($credentials)){
                    return redirect('/');
                }
            }
        }else{
            $user = Employee::where('email',$credentials['email'])->first();

            if($user && $user->isEmployee()){
                if(Auth::guard('employee')->attempt($credentials)){
                    return redirect('/');
                }
            }else{
                return redirect()->back()->withErrors(
                    [
                        'error'=> 'the credentials dosn\'t match our records'
                    ]
                );
            }

        }
        return redirect()->back()->withErrors(['message' => 'Login failed.']);
    }
}
