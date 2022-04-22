@extends('layouts.admin')
@section('title', 'انشاء منطقة')
@section('breadcrumb')
{{ Breadcrumbs::render('regions.index') }}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">انشاء منطقة</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('regions.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">اسم منطقة باللغة الانجليزية</label>
                <input type="name" name="name[en]" value="{{old('name.en')}}" class="form-control" id="name" placeholder="ادخل اسم منطقة باللغة الانجليزية">
                <small id="name" class="form-text text-muted">اسم منطقة الانجليزية يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="name">اسم منطقة باللغة العربية</label>
                <input type="name" name="name[ar]" value="{{old('name.ar')}}" class="form-control" id="name" placeholder="ادخل اسم منطقة باللغة العربية">
                <small id="name" class="form-text text-muted">اسم منطقة العربية يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="status">حالة منطقة</label>
                <select name="status" class="custom-select" id="status">
                    <option selected disabled>احتر حالة منطقة</option>
                    @foreach ($statuses as $status => $value)
                        <option @selected(old('status')=== $value) value="{{ $value }}"> {{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="latitude">خط الغرض</label>
                <input type="text" name="latitude" value="{{old('latitude')}}" class="form-control" id="latitude" placeholder="ادخل خط العرص ">
                <small id="latitude" class="form-text text-muted">خط العرض يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="longitude">خط الغرض</label>
                <input type="text" name="longitude" value="{{old('longitude')}}" class="form-control" id="longitude" placeholder="ادخل خط الطول ">
                <small id="longitude" class="form-text text-muted">خط الطول يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="raduis">نص القطر</label>
                <input type="text" name="raduis" value="{{old('raduis')}}" class="form-control" id="raduis" placeholder="ادخل نص القطر ">
                <small id="raduis" class="form-text text-muted">نص القطر يجب ان يكون مميز و خاص بك </small>
            </div>

            <div class="form-group">
                <label for="city_id">المدينة</label>
                <select name="city_id" class="custom-select" id="city_id">
                    <option selected disabled>احتر المدينة</option>
                    @foreach ($cities as $city)
                        <option @selected(old('city_id') == $city->id) value="{{ $city->id }}"> {{ $city->getTranslation('name','en') }} - {{ $city->getTranslation('name','ar') }} </option>
                    @endforeach
                </select>
            </div>
            @include('includes.create-submit-buttons')
        </form>
    </div>

@endsection
