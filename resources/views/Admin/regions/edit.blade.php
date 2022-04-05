@extends('layouts.admin')
@section('title', 'تعديل المنطقة')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">تعديل المنطقة</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('regions.update',['id'=>$region->id]) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">اسم المنطقة</label>
                <input type="name" name="name" value={{$region->name}} class="form-control" id="name" placeholder="ادخل اسم المنطقة">
                <small id="name" class="form-text text-muted">اسم المنطقة يجب ان يكون مميز و خاص بك </small>
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
                          <option @selected($region->city_id == $city->id) value="{{ $city->id }}"> {{ $city->name }}</option>
                     @endforeach
                </select>
            </div>
            <button type="submit" name="edit" class="btn btn-primary">تعديل </button>
            {{-- <button type="submit" name="create-return" class="btn btn-outline-primary">انشاء و رجوع  </button> --}}

        </form>
    </div>

@endsection
