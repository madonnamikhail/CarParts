<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\Admins\UpdateAdminProfileRequest;
use App\Http\Requests\Admin\Admins\UpdateAdminPasswordRequest;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->id());
        return view('Admin.admins.profile',compact('admin'));
    }
    public function update(UpdateAdminProfileRequest $request)
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->id());
        if($request->hasFile('image')){
            if(isset($admin->getMedia('admins')[0])){
                $admin->getMedia('admins')[0]->delete(); // remove old image
            }
            $admin->addMediaFromRequest('image')->toMediaCollection('admins'); // store new image
        }
        $admin->update(['name'=>$request->name]);
        return redirect()->back()->with('success', 'تمت العملية بنجاح');
    }
    public function passwordReset()
    {
        return view('Admin.admins.password-reset');
    }
    public function passwordUpdate(UpdateAdminPasswordRequest $request)
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->id());
        $admin->update(['password'=>Hash::make($request->password)]);
        return redirect()->back()->with('success', 'تمت العملية بنجاح');
    }
}
