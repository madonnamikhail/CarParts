<?php

use Illuminate\Support\Facades\Auth;
use App\Services\PermissionGenerator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ShopsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ModelsController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\RegionsController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\SellersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\AddressesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\Auth\ProfileController;
use App\Http\Controllers\Admin\Auth\SettingsController;
use App\Http\Controllers\Admin\PutPermissionsController;

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
    Route::resource('products',ProductsController::class);
    Route::get('products/{product}/reviews',[ReviewsController::class,'index'])->name('reviews.index');
    Route::delete('products/{product}/{user}/review/destroy',[ReviewsController::class,'destroy'])->name('reviews.destroy');
    Route::resource('sellers',SellersController::class)->except('show');
    Route::resource('shops',ShopsController::class)->except('show');
    Route::resource('specs',SpecsController::class)->except('show');
    Route::resource('users',UsersController::class)->except('show');
    Route::patch('users/change/status/{user}',[UsersController::class,'changeStatus'])->name('users.status');
    Route::resource('users.addresses',AddressesController::class)->except('show');
    Route::resource('offers', OffersController::class)->except('show');
    Route::resource('coupons', CouponsController::class)->except('show');
    Route::resource('orders', OrdersController::class)->except('show');


    Route::post('offers/products/store',[OffersController::class,'productsStore'])->name('offers.products.store');


    Route::prefix('profile')->name('profile')->controller(ProfileController::class)->group(function(){
        Route::get('/','index');
        Route::put('/','update')->name('.update');
        Route::get('/password/change','passwordChange')->name('.change.password');
        Route::put('/password/change','passwordUpdate')->name('.update.password');
    });



});
Route::get('/test',[PutPermissionsController::class , 'verified']);


Auth::routes(['register' => (bool)config('app.admins'), 'verify' => true]);//, 'verify' => true

// Route::get('test',function(){
//         dd((new PermissionGenerator)->generate()->exceptNamespaces(['App\Http\Controllers\Admin\Auth']));
// });




