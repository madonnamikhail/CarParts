<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\PermissionGenerator;
use Spatie\Permission\Models\Permission;

class PutPermissionsController extends Controller
{
    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function verified(Request $request)
    {

        //
        $role = Role::create(['name' => 'Super Admin','guard_name'=>'admin']);
        $this->guard()->user()->assignRole($role);
        $controllers_permissions = (new PermissionGenerator)->generate()->exceptNamespaces(["App\Http\Controllers\Admin\Auth"])->exceptMethods(['create','edit'])->get();
        foreach($controllers_permissions AS $controller => $permissions){
            foreach($permissions AS $permission){
                Permission::create(['name'=>ucwords("{$permission} {$controller}"),'guard_name'=>'admin','controller'=>$controller]);
            }
        }
        return "hhhhh";

    }
}
