@extends('layouts.admin')
@section('title', 'انشاء علامة تجارية')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">انشاء علامة تجارية</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('brands.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">اسم العلامة التجارية</label>
                <input type="name" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="ادخل اسم العلامة التجارية">
                <small id="name" class="form-text text-muted">اسم العلامة التجارية يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="status">حالة العلامة التجارية</label>
                <select name="status" class="custom-select" id="status">
                    <option selected disabled>احتر حالة العلامة التجارية</option>
                    @foreach ($statuses as $status => $value)
                        <option @selected(old('status')=== $value) value="{{ $value }}"> {{ $status }}</option>
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
