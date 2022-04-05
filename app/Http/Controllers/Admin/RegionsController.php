<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Regions\StoreRegionRequest;
use App\Http\Requests\Admin\Regions\UpdateRegionRequest;

class RegionsController extends Controller
{
    public const AVAILABLE_STATUS=['متاح التوصيل'=>1,'غير متاح التوصيل'=>'0'];


    public function index()
    {
        $regions=Region::get();
        $cities=City::all();
        return view('Admin.regions.index',compact('regions','cities'));
    }

    public function create()
    {
        $cities=City::all();
        return view('Admin.regions.create',['cities'=>$cities,'statuses'=>self::AVAILABLE_STATUS]);
    }

    public function store(StoreRegionRequest $request)
    {
        Region::create($request->all());
        return redirectAccordingToRequest($request ,'success');
    }

    public function edit($id)
    {
        $region=Region::findOrFail($id);
        $cities=City::all();
        return view('Admin.regions.edit',['cities'=>$cities,'region'=>$region,'statuses'=>self::AVAILABLE_STATUS]);
    }
    public function update(UpdateRegionRequest $request , $id)
    {
        Region::findOrFail($id)->update($request->all());
        return redirect()->route('regions.index')->with('success','تمت العملية بنجاح');
    }
    public function destroy($id)
    {
        $model=Region::findOrFail($id)->delete();
        return  redirect()->back()->with('success','تمت العملية بنجاح');
    }


}
