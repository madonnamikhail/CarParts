<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Models\StoreModelRequest;
use App\Http\Requests\Admin\Models\UpdateModelRequest;
use App\Models\Brand;
use App\Models\Models;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    public const AVAILABLE_STATUS=['متاح'=>1,'غير متاح'=>'0'];

    public function index()
    {
        $models=Models::all();
        $brands=Brand::get();
        return view('Admin.models.index',compact('models','brands'));
    }
    public function create()
    {
        $brands=Brand::get();
        return view('Admin.models.create',['brands'=>$brands,'statuses'=>self::AVAILABLE_STATUS]);
    }
    public function store(StoreModelRequest $request)
    {
        Models::create($request->all());
        return redirectAccordingToRequest($request ,'success');
    }
    public function edit($id)
    {
        $model=Models::findOrFail($id);
        $brands=Brand::get();
        return view('Admin.models.edit',['model'=>$model,'brands'=>$brands,'statuses'=>self::AVAILABLE_STATUS]);
    }
    public function update(UpdateModelRequest $request , $id)
    {
        Models::findOrFail($id)->update($request->all());
        return redirect()->route('models.index')->with('success','تمت العملية بنجاح');
    }
    public function destroy($id)
    {
        $model=Models::findOrFail($id)->delete();
        return  redirect()->back()->with('success','تمت العملية بنجاح');
    }
}
