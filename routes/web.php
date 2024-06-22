<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\web\Admin\auth\AdminAuthController;
use App\Http\Controllers\web\Admin\AdminController;
use App\Http\Controllers\web\Admin\ApplicationController;
use App\Http\Controllers\web\Admin\ClientController;
use App\Http\Controllers\web\Admin\DomainController;
use App\Http\Controllers\web\Admin\ServiceController;
use App\Http\Controllers\web\client\auth\AuthController;
use App\Http\Controllers\web\Client\ClientController as ClientClientController;
use App\Http\Controllers\web\employee\auth\AuthController as EmployeeAuthController;
use App\Http\Controllers\web\employee\ProfileContollrt;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
        });
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

