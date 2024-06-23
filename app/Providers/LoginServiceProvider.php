<?php

namespace App\Providers;

use App\Contracts\Strategies\LoginStrategieContract;
use App\Enums\Employee\Status;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Services\Strategies\ClientLoginStrategie;
use App\Services\Strategies\EmployeeLoginStrategie;
use GuzzleHttp\Client;

class LoginServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(LoginStrategieContract::class , function($app){
            $requst = $app->make(Request::class);
            
            $user = User::where('email' , $requst->email)->first();

            $employee = Employee::where('email' , $requst->email)
            ->where('status' ,'!=', Status::REFUSED)->first();

            if($user){
                if($user->hasRole('client')){
                    return new ClientLoginStrategie();
                }
            }elseif($employee){
                if($employee->hasRole('employee')){
                    return new EmployeeLoginStrategie();
                }
            }
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function validate(){
        
    }
}
