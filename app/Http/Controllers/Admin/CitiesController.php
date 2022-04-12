<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cities\StoreCityRequest;
use App\Http\Requests\Admin\Cities\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    //
    public const AVAILABLE_STATUS=['متاح التوصيل'=>1,'غير متاح التوصيل'=>'0'];

    public function index()
    {
        $cities=City::all();
        return view('Admin.cities.index',compact('cities'));
    }

    public function create()
    {
        return view('Admin.cities.create',['statuses'=>self::AVAILABLE_STATUS]);
    }

    public function store(StoreCityRequest $request)
    {
        City::create($request->all());
        return redirectAccordingToRequest($request ,'success');
    }

    public function edit(City $city)
    {
        // $city=City::findOrFail($id);
        return view('Admin.cities.edit',['city'=>$city,'statuses'=>self::AVAILABLE_STATUS]);
    }
    public function update(UpdateCityRequest $request ,City $city)
    {
        $city->update($request->all());
        return redirect()->route('cities.index')->with('success','تمت العملية بنجاج');
    }
    public function destroy(City $city)
    {
        $city->delete();
        return  redirect()->back()->with('success','تمت العملية بنجاح');
    }

}
