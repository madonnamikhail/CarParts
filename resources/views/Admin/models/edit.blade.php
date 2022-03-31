@extends('layouts.admin')
@section('title', 'تعديل الموديل')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">تعديل الموديل</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('models.update',['id'=>$model->id]) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">اسم الموديل</label>
                <input type="name" name="name" value={{$model->name}} class="form-control" id="name" placeholder="ادخل اسم الموديل">
                <small id="name" class="form-text text-muted">اسم الموديل يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="year">سنة الموديل</label>
                <input type="year" name="year" value={{$model->year}} class="form-control" id="year" placeholder="ادخل سنة الموديل">
                <small id="year" class="form-text text-muted">سنة الموديل يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="status">حالة الموديل</label>
                <select name="status" class="custom-select" id="status">
                    @foreach ($statuses as $status => $value)
                        <option @selected($model->status===$model) value="{{ $value }}"> {{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brand_id">العلامة التجارية</label>
                <select name="brand_id" class="custom-select" id="status">
                    @foreach ($brands as $brand)
                            <option @selected($model->brand_id == $brand->id) value="{{ $brand->id }}"> {{ $brand->name }}</option>
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
            <button type="submit" name="edit" class="btn btn-primary">تعديل </button>
        </form>
    </div>

@endsection
