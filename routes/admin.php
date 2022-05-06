<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\ModelsController;
use App\Http\Controllers\Admin\RegionsController;
use App\Http\Controllers\Admin\DashboardController;




//Admin Dashboard
Route::middleware('verified:admin')->group(function(){ //auth:admin
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('brands', BrandsController::class)->except('show');
    Route::resource('cities', CitiesController::class)->except('show');
    Route::resource('models', ModelsController::class)->except('show');
    //regions
    Route::group(['prefix'=>'regions','as'=>'regions.','controller'=>RegionsController::class],function(){
        Route::get('/','index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('{id}/edit','edit')->name('edit');
        Route::put('{id}/update','update')->name('update');
        Route::delete('{id}/destroy','destroy')->name('destroy');
    });
    Route::resource('admins' , AdminsController::class)->except('show');
    Route::resource('roles' , RolesController::class)->except('show');
});

Auth::routes(['register' => (bool)config('app.admins'), 'verify' => true]);//, 'verify' => true




