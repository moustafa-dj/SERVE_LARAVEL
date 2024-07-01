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
