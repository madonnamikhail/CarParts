<?php

use Illuminate\Support\Facades\Auth;
use App\Services\PermissionGenerator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ShopsController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\ModelsController;
use App\Http\Controllers\Admin\RegionsController;
use App\Http\Controllers\Admin\SellersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
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
    Route::get('theme/{theme}',[SettingsController::class,'theme'])->name('theme');

    Route::resource('categories',CategoriesController::class)->except('show');
    Route::resource('products',ProductsController::class)->except('show');
    Route::resource('sellers',SellersController::class)->except('show');
    Route::resource('shops',ShopsController::class)->except('show');





    Route::prefix('profile')->name('profile')->controller(ProfileController::class)->group(function(){
        Route::get('/','index');
        Route::put('/','update')->name('.update');
        Route::get('/password/reset','passwordReset')->name('.reset.password');
        Route::put('/password/reset','passwordUpdate')->name('.update.password');
    });


});

Auth::routes(['register' => (bool)config('app.admins'), 'verify' => true]);//, 'verify' => true

// Route::get('test',function(){
//         dd((new PermissionGenerator)->generate()->exceptNamespaces(['App\Http\Controllers\Admin\Auth']));
// });




