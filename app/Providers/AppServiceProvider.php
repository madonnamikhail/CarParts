<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // $admin = Admin::all()->first();
        // if($admin){
        //     config(['app.admins'=>false]);
        // }

        // try {
        //     $admin = Admin::all()->first();
        //     config(['app.admins'=>false]);
        // } catch (\Exception $exception) {

        // }
    }
}
