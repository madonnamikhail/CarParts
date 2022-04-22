<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Models;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Admin\Models\StoreModelRequest;
use App\Http\Requests\Admin\Models\UpdateModelRequest;


class ModelsController extends Controller
{
    public const AVAILABLE_STATUS = ['متاح' => 1, 'غير متاح' => '0'];
    public const AVAILABLE_EXTENSIONS = ['png', 'jpg', 'jpeg'];

    public function index()
    {
        $models = Models::all();
        $brands = Brand::get();
        return view('Admin.models.index', compact('models', 'brands'));
    }
    public function create()
    {
        $brands = Brand::get();
        return view('Admin.models.create', ['brands' => $brands, 'statuses' => self::AVAILABLE_STATUS]);
    }
    public function store(StoreModelRequest $request)
    {
        $model = Models::create($request->all());
        $model->addMediaFromRequest('image')->toMediaCollection('models');
        if ($request->has('resize')) {
            Image::make($model->getFirstMediaPath('models'))->resize($request->width, $request->heigth)->save($model->getFirstMediaPath('models'));
        }
        return redirectAccordingToRequest($request, 'success');
    }
    public function edit(Models $model)
    {
        // return asset($model->getFirstMediaUrl('models'));
        $brands = Brand::get();
        return view('Admin.models.edit', ['model' => $model, 'brands' => $brands, 'statuses' => self::AVAILABLE_STATUS]);
    }
    public function update(UpdateModelRequest $request, Models $model)
    {
        // $model=Models::findOrFail($id);
        $model->update($request->all());
        if ($request->hasFile('image')) {
            if (isset($model->getMedia('models')[0])) {
                $model->getMedia('models')[0]->delete(); //remove old image
            }
            $model->addMediaFromRequest('image')->toMediaCollection('models');
        }
        if ($request->has('resize')) {
            $model = Models::find($request->id);
            Image::make($model->getFirstMediaPath('models'))->resize($request->width, $request->height)->save($model->getFirstMediaPath('models'));
        }
        return redirect()->route('models.index')->with('success', 'تمت العملية بنجاح');
    }
    public function destroy($id)
    {
        $model = Models::findOrFail($id)->delete();
        return  redirect()->back()->with('success', 'تمت العملية بنجاح');
    }
}
