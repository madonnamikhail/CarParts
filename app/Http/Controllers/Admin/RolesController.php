<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\admin\Roles\StoreRoleRequest;
use App\Http\Requests\admin\Roles\UpdateRoleRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles=Role::all();
        return view('Admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $controller_permissions = Permission::all()->groupBy('controller');
        return view('Admin.roles.create',compact('controller_permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        try{
            //1-store new role
            $role = Role::create(['name'=>$request->name,'guard_name'=>'admin']);
            //2-assgin permissions to this role
                //to assgin more than one role at the same time
            $role->syncPermissions($request->permission_id);
            return $this->redirectAccordingToRequest($request,'success');
        }catch(\Exception $e){
            return $this->redirectAccordingToRequest($request,'error');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role_permissions_ids = $role->getAllPermissions()->pluck('id')->toArray();
        $controller_permissions = Permission::all()->groupBy('controller');
        return view('Admin.roles.edit',compact('role','controller_permissions','role_permissions_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        try{
            $role->update(['name'=>$request->name]);
            $role->syncPermissions($request->permission_id);
            return redirect()->route('roles.index')->with('success', 'تمت العملية بنجاح');
        }catch(\Exception $e){
            return redirect()->route('roles.index')->with('error', 'فشلت العملية');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'تمت العملية بنجاح');
    }
}
