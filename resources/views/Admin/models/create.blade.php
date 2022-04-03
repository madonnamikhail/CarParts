@extends('layouts.admin')
@section('title', 'انشاء موديل')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">انشاء موديل</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('models.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">اسم الموديل</label>
                <input type="name" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="ادخل اسم الموديل ">
                <small id="name" class="form-text text-muted">اسم الموديل يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="year">سنة الموديل</label>
                <input type="name" name="year" value="{{old('year')}}" class="form-control" id="year" placeholder="ادخل اسم الموديل ">
                <small id="year" class="form-text text-muted">اسم الموديل يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="status">حالة الموديل</label>
                <select name="status" class="custom-select" id="status">
                    <option selected disabled>احتر حالة الموديل</option>
                    @foreach ($statuses as $status => $value)
                        <option @selected(old('status') === $value) value="{{ $value }}"> {{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brand_id">العلامة التجارية</label>
                <select name="brand_id" class="custom-select" id="status">
                    <option selected disabled>احتر العلامة التجارية</option>
                    @foreach ($brands as $brand)
                        <option @selected(old('brand_id') == $brand->id) value="{{ $brand->id }}"> {{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">رفع</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">اختر لوجو</label>
                </div>
            </div>
            @include('includes.create-submit-buttons')
        </form>
    </div>

@endsection
