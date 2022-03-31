@extends('layouts.admin')
@section('title', 'تعديل علامة تجارية')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">تعديل علامة تجارية</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('brands.update',['id'=>$brand->id]) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">اسم العلامة التجارية</label>
                <input type="name" name="name" value={{$brand->name}} class="form-control" id="name" placeholder="ادخل اسم العلامة التجارية">
                <small id="name" class="form-text text-muted">اسم العلامة التجارية يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="status">حالة العلامة التجارية</label>
                <select name="status" class="custom-select" id="status">
                    {{-- <option selected disabled>احتر حالة العلامة التجارية</option> --}}
                    @foreach ($statuses as $status => $value)
                        <option @selected($brand->status==$value ) value="{{ $value }}"> {{ $status }}</option>
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
            {{-- <button type="submit" name="create-return" class="btn btn-outline-primary">انشاء و رجوع  </button> --}}

        </form>
    </div>

@endsection
