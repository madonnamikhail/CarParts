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

    public function edit(UpdateRegionRequest $request ,$id)
    {
        $region=Region::findOrFail($id);
        return view('Admin.regions.edit',['region'=>$region,'statuses'=>self::AVAILABLE_STATUS]);
    }


}
