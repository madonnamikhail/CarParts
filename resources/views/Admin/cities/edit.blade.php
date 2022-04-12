@extends('layouts.admin')
@section('title', 'تعديل مدينة')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">تعديل مدينة</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('cities.update',$city->id) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name"> اسم المدينة باللغة العربية</label>
                <input type="name" name="name[ar]" value={{$city->getTranslation('name' , 'ar')}} class="form-control" id="name" placeholder="ادخل اسم العلامة التجارية">
                <small id="name" class="form-text text-muted">اسم المدينة العربية يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="name"> اسم المدينة باللغة الانجليزية</label>
                <input type="name" name="name[en]" value={{$city->getTranslation('name' , 'en')}} class="form-control" id="name" placeholder="ادخل اسم العلامة التجارية">
                <small id="name" class="form-text text-muted">اسم المدينة الانجليزية يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="status">حالة المدينة</label>
                <select name="status" class="custom-select" id="status">
                    @foreach ($statuses as $status => $value)
                        <option @selected($city->status==$value ) value="{{ $value }}"> {{ $status }}</option>
                        {{-- <option @selected($city->status==0 ) value="0"> {{ غير مفعل }}</option> --}}

                    @endforeach
                </select>
            </div>
            <button type="submit" name="edit" class="btn btn-primary">تعديل </button>
            {{-- <button type="submit" name="create-return" class="btn btn-outline-primary">انشاء و رجوع  </button> --}}

        </form>
    </div>

@endsection
