<?php

namespace App\Http\Middleware;

use App\Contracts\Strategies\LoginStrategieContract;
use App\Models\User;
use App\Services\Strategies\ClientLoginStrategie;
use App\Services\Strategies\EmployeeLoginStrategie;
use App\Services\Strategies\LoginStrategieContext;
use Closure;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLoginStrategy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_email = $request->input('email');

        $loginContext = new LoginStrategieContext();

        $user = User::where('email',$user_email);

        if($user->hasRole('client')){
            $loginContext->setStrategie(new ClientLoginStrategie());
        }

        if($user->hasRole('employee')){
            $loginContext->setStrategie(new EmployeeLoginStrategie());
        }
        app()->instance(LoginStrategieContext::class , $loginContext);

        return $next($request);
    }
}
