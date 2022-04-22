@extends('layouts.admin')
@section('title', "تعديل {$region->name}")
@section('breadcrumb')
{{ Breadcrumbs::render('regions.edit',$region) }}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('regions.update',['id'=>$region->id]) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">اسم المنطقة باللغة الانجليزية</label>
                <input type="name" name="name[en]" value={{$region->getTranslation('name','en')}} class="form-control" id="name" placeholder="ادخل اسم المنطقة">
                <small id="name" class="form-text text-muted">اسم المنطقة الانجليزية يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="name">اسم المنطقة باللغة العربية</label>
                <input type="name" name="name[ar]" value={{$region->getTranslation('name','ar')}} class="form-control" id="name" placeholder="ادخل اسم المنطقة">
                <small id="name" class="form-text text-muted">اسم المنطقة العربية يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="status">حالة المدينة</label>
                <select name="status" class="custom-select" id="status">
                    @foreach ($statuses as $status => $value)
                        <option @selected($region->status==$value ) value="{{ $value }}"> {{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="latitude">خط الغرض</label>
                <input type="text" name="latitude" value="{{$region->latitude}}" class="form-control" id="latitude" placeholder="ادخل خط العرص ">
                <small id="latitude" class="form-text text-muted">خط العرض يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="longitude">خط الغرض</label>
                <input type="text" name="longitude" value="{{$region->longitude}}" class="form-control" id="longitude" placeholder="ادخل خط الطول ">
                <small id="longitude" class="form-text text-muted">خط الطول يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="raduis">نص القطر</label>
                <input type="text" name="raduis" value="{{$region->raduis}}" class="form-control" id="raduis" placeholder="ادخل نص القطر ">
                <small id="raduis" class="form-text text-muted">نص القطر يجب ان يكون مميز و خاص بك </small>
            </div>

            <div class="form-group">
                <label for="city_id">المدينة</label>
                <select name="city_id" class="custom-select" id="city_id">
                    <option selected disabled>احتر المدينة</option>
                    @foreach ($cities as $city)
                          <option @selected($region->city_id == $city->id) value="{{ $city->id }}">{{ $city->getTranslation('name','en') }} - {{ $city->getTranslation('name','ar') }}</option>
                     @endforeach
                </select>
            </div>
            <button type="submit" name="edit" class="btn btn-primary">تعديل </button>
        </form>
    </div>

@endsection
