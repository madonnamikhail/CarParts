@extends('layouts.admin')
@section('title', 'انشاء مدينة')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">انشاء مدينة</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('cities.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">اسم المدينة</label>
                <input type="name" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="ادخل اسم المدينة ">
                <small id="name" class="form-text text-muted">اسم المدينة يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="status">حالة العلامة التجارية</label>
                <select name="status" class="custom-select" id="status">
                    <option selected disabled>احتر حالة المدينة</option>
                    @foreach ($statuses as $status => $value)
                        <option @selected(old('status')=== $value) value="{{ $value }}"> {{ $status }}</option>
                    @endforeach
                </select>
            </div>
            @include('includes.create-submit-buttons')
        </form>
    </div>

@endsection
