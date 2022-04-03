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
    public const AVAILABLE_STATUS=['مفعل'=>1,'غير مفعل'=>'0'];
    public const AVAILABLE_EXTENSIONS=['png','jpg','jpeg'];
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
        // fileSystem
        // $path=$request->file('image')->storeAs('brands',$request->file('image')->hashName());
        // return $path;
        $brand=Brand::create($request->validated());
        $brand->addMediaFromRequest('image')->toMediaCollection('brands');
        return redirectAccordingToRequest($request ,'success');

    }
    public function edit($id)
    {
        $brand=Brand::findOrFail($id);
        // dd($brand->getFirstMediaUrl('images'));
        return view('Admin.brands.edit',['brand'=>$brand,'statuses'=>self::AVAILABLE_STATUS]);
    }
    public function update(UpdateBrandRequest $request ,$id)
    {
        $brand=Brand::findOrFail($id);
        $brand->update($request->all());
        if($request->hasFile('image')){   //check if request has image or not
            $brand->getMedia('brands')[0]->delete(); //remove old image
            $brand->addMediaFromRequest('image')->toMediaCollection('brands'); //store new image


        }
        return  redirect()->route('brands.index')->with('success','تمت العملية بنجاح');
    }

    public function destroy($id)
    {
        $brand=Brand::findOrFail($id)->delete();
        return  redirect()->back()->with('success','تمت العملية بنجاح');

    }


}
