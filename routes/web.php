<?php

use App\Http\Controllers\web\Admin\auth\AdminAuthController;
use App\Http\Controllers\web\Admin\AdminController;
use App\Http\Controllers\web\Admin\DomainController;
use App\Http\Controllers\web\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::get('/login' , [AdminAuthController::class , 'index'])->name('login');
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
    });
});

