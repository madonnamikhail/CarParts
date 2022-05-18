<?php

use Illuminate\Support\Facades\Auth;
use App\Services\PermissionGenerator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\ModelsController;
use App\Http\Controllers\Admin\RegionsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\ProfileController;
use App\Http\Controllers\Admin\Auth\SettingsController;

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
    Route::get('profile',[ProfileController::class , 'index'])->name('profile');
    Route::put('profile',[ProfileController::class , 'update'])->name('profile.update');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/password/reset',[ProfileController::class,'passwordReset'])->name('profile.reset.password');
    Route::put('profile/password/reset',[ProfileController::class,'passwordUpdate'])->name('profile.update.password');
    Route::get('theme/{theme}',[SettingsController::class,'theme'])->name('theme');

});

Auth::routes(['register' => (bool)config('app.admins'), 'verify' => true]);//, 'verify' => true

// Route::get('test',function(){
//         dd((new PermissionGenerator)->generate()->exceptNamespaces(['App\Http\Controllers\Admin\Auth']));
// });




