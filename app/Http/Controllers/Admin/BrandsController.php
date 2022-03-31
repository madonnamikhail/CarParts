<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\Admin\Brands\StoreBrandRequest;
use App\Http\Requests\Admin\Brands\UpdateBrandRequest;

use Illuminate\Http\Request;

class BrandsController extends Controller
{
    //
    const AVAILABLE_STATUS=['مفعل'=>1,'غير مفعل'=>'0'];
    public function index()
    {
        $brands=Brand::all();
        return view('Admin.brands.index',compact('brands'));
    }
    public function create()
    {
        return view('Admin.brands.create',['statuses'=>self::AVAILABLE_STATUS]);
    }

    public function store(StoreBrandRequest $request)
    {
        Brand::create($request->all());
        return redirectAccordingToRequest($request ,'success');

    }
    public function edit($id)
    {
        $brand=Brand::findOrFail($id);
        return view('Admin.brands.edit',['brand'=>$brand,'statuses'=>self::AVAILABLE_STATUS]);
    }
    public function update(UpdateBrandRequest $request ,$id)
    {
        Brand::findOrFail($id)->update($request->all());
        return  redirect()->route('brands.index')->with('success','تمت العملية بنجاح');
    }

    public function destroy($id)
    {
        $brand=Brand::findOrFail($id)->delete();
        return  redirect()->back()->with('success','تمت العملية بنجاح');

    }


}
