<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\web\Admin\auth\AdminAuthController;
use App\Http\Controllers\web\Admin\AdminController;
use App\Http\Controllers\web\Admin\ApplicationController;
use App\Http\Controllers\web\Admin\ClientController;
use App\Http\Controllers\web\Admin\DomainController;
use App\Http\Controllers\web\Admin\EmployeeController;
use App\Http\Controllers\web\Admin\EquipmentController;
use App\Http\Controllers\web\Admin\InterventionController;
use App\Http\Controllers\web\Admin\ServiceController;
use App\Http\Controllers\web\client\auth\AuthController;
use App\Http\Controllers\web\Client\ClientController as ClientClientController;
use App\Http\Controllers\web\client\OrderController as ClientOrderController;
use App\Http\Controllers\web\Admin\OrderController as AdminOrderController;

use App\Http\Controllers\web\employee\auth\AuthController as EmployeeAuthController;
use App\Http\Controllers\web\employee\ProfileContollrt;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Route;


Route::get('/' , [FrontController::class , 'index'])->name('home');
Route::get('/service/{id}' , [FrontController::class , 'getServiceDetails'])->middleware('login')->name('service-details');


Route::post('/login' , [LoginController::class , 'login'])->name('login');

Route::prefix('admin')->group(function(){
    Route::get('/login' , [AdminAuthController::class , 'index'])->name('admin.login');
    Route::post('/login' , [AdminAuthController::class , 'login'])->name('admin.login-admin');

    Route::middleware(['auth:admin'])->group(function(){
        Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('/logout' , [AdminAuthController::class , 'logout'])->name('admin.logout');

        //domain routes

        Route::prefix('domain')->group(function(){

        });
        Route::resource('domains',DomainController::class);
        Route::resource('services' , ServiceController::class);

        Route::prefix('profile')->group(function(){
            Route::get('/profile' , [AdminController::class,'renderProfile'])->name('admin.profile');
            Route::put('/update' , [AdminController::class , 'update'])->name('admin.profile.update');
            Route::post('/remove-img' , [AdminController::class , 'removeProfileImg'])->name('admin.profile.remove-img');
            Route::post('/update-pass' , [AdminController::class , 'updatePass'])->name('admin.profile.update-pass');
        });

        Route::prefix('clients')->group(function(){
            Route::get('/index' , [ClientController::class , 'index'])->name('admin.clients.index');
        });

        Route::prefix('applications')->group(function(){
            Route::get('/' , [ApplicationController::class , 'index'])->name('admin.applications.index');
            Route::get('/{id}' , [ApplicationController::class , 'show'])->name('admin.applications.show');
            Route::get('/resume/{id}' , [ApplicationController::class , 'dawnloadResume'])->name('admin.applications.dawnload-resume');
            Route::get('/accepte/{id}' , [ApplicationController::class , 'acceptApplication'])->name('admin.applications.approve');
            Route::get('/refuse/{id}' , [ApplicationController::class , 'refuseApplication'])->name('admin.applications.refuse');
        });

        Route::prefix('employees')->group(function(){
            // Route::get('/' , [EmployeeController::class , 'index'])->name('admin.employees.index');
            // Route::get('/{id}' , [EmployeeController::class , 'show'])->name('admin.employees.show');
            Route::get('/resume/{id}' , [EmployeeController::class , 'dawnloadResume'])->name('admin.employees.dawnload-resume');
            // Route::get('/accepte/{id}' , [EmployeeController::class , 'acceptApplication'])->name('admin.employees.approve');
            // Route::get('/refuse/{id}' , [EmployeeController::class , 'refuseApplication'])->name('admin.employees.refuse');
        });

        Route::resource('employees' , EmployeeController::class);

        Route::prefix('order')->group(function(){
            Route::get('/' , [AdminOrderController::class , 'index'])->name('admin.order.index');
            Route::get('/{id}' , [AdminOrderController::class , 'show'])->name('admin.order.show');
            Route::get('/process/{id}' , [AdminOrderController::class , 'processOrder'])->name('admin.order.process');
            Route::get('/refuse/{id}' , [AdminOrderController::class , 'refuseOrder'])->name('admin.order.refuse');
            Route::post('/accept/{id}' , [AdminOrderController::class , 'acceptOrder'])->name('admin.order.accept');
        });

        Route::prefix('interventions')->group(function(){
            Route::get('/' , [InterventionController::class , 'index'])->name('admin.intervention.index');
            Route::get('/{id}' , [InterventionController::class , 'show'])->name('admin.intervention.show');
            Route::get('/detach/{id}/employee/{employee_id}/' , [InterventionController::class , 'detachEmployee'])->name('admin.intervention.detach-employee');
            Route::get('/detach/{id}/equipment/{equipment_id}' , [InterventionController::class , 'detachEquipment'])->name('admin.intervention.detach-equipment');
            Route::get('/confirm/{id}' , [InterventionController::class , 'confirmIntervention'])->name('admin.intervention.confirm');
        });

        Route::resource('equipments' , EquipmentController::class);

    });
});

Route::prefix('client')->group(function(){
    Route::get('/login' , [AuthController::class , 'loginForm'])->name('client.login-form');
    Route::post('/login' , [AuthController::class , 'login'])->name('client.login');
    Route::get('/register' , [AuthController::class, 'registerForm'])->name('client.register');
    Route::post('/register' , [AuthController::class, 'register'])->name('client.register');

    Route::middleware(['client'])->group(function(){
        Route::get('/logout' , [AuthController::class , 'logout'])->name('client.logout');
        Route::prefix('profile')->group(function(){
            Route::get('/' , [ClientClientController::class , 'index'])->name('client.profile');
            Route::put('/update' , [ClientClientController::class , 'update'])->name('client.profile.update');
            Route::post('/update-pass' , [ClientClientController::class , 'updatePass'])->name('client.profile.update-pass');
        });

        Route::prefix('order')->group(function(){
            Route::post('/make-order' , [ClientOrderController::class , 'store'])->name('client.order.store');
        });
    });
});

Route::prefix('employee')->group(function(){
    Route::get('register' ,[EmployeeAuthController::class , 'registerForm'])->name('employee.register-form');
    Route::post('/register' ,[EmployeeAuthController::class , 'register'])->name('employee.register');

    Route::middleware(['auth:employee'])->group(function(){
        Route::get('/logout' , [EmployeeAuthController::class , 'logout'])->name('employee.logout');
        Route::prefix('profile')->group(function(){
            Route::get('/' , [ProfileContollrt::class , 'index'])->name('employee.profile');
            Route::put('/update' , [ProfileContollrt::class , 'update'])->name('employee.profile.update');
            Route::post('/update-pass' , [ProfileContollrt::class , 'updatePass'])->name('employee.profile.update-pass');
        });
    });

});

