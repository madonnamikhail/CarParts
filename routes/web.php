<?php

use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ModelsController;
use App\Http\Controllers\Admin\RegionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Admin Dashboard
Route::group(['prefix'=>'admin'],function(){
    Route::get('/', DashboardController::class)->name('dashboard');
    //Brands
    Route::group(['prefix'=>'brands','as'=>'brands.','controller'=>BrandsController::class],function(){
        Route::get('/','index')->name('index');
        Route::get('create','create')->name('create');
        Route::get('{brand}/edit','edit')->name('edit');
        Route::post('store','store')->name('store');
        Route::put('{brand}/update','update')->name('update');
        Route::delete('{id}/destroy','destroy')->name('destroy');
    });
    //Cities
    Route::group(['prefix'=>'cities','as'=>'cities.','controller'=>CitiesController::class],function(){
        Route::get('/','index')->name('index');
        Route::get('creat','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('{id}/edit','edit')->name('edit');
        Route::put('{id}/update','update')->name('update');
        Route::delete('{id}/destroy','destroy')->name('destroy');
    });
    //models
    Route::group(['prefix'=>'models','as'=>'models.','controller'=>ModelsController::class],function(){
        Route::get('/','index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('{id}/edit','edit')->name('edit');
        Route::put('{id}/update','update')->name('update');
        Route::delete('{id}/destroy','destroy')->name('destroy');
    });
    //regions
    Route::group(['prefix'=>'regions','as'=>'regions.','controller'=>RegionsController::class],function(){
        Route::get('/','index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('{id}/edit','edit')->name('edit');
        Route::put('{id}/update','update')->name('update');
        Route::delete('{id}/destroy','destroy')->name('destroy');
    });



});










//User Dashboard
Route::group([],function(){

});
