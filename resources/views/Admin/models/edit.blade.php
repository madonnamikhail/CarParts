@extends('layouts.admin')
@section('title', 'تعديل الموديل')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">تعديل الموديل</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('models.update',['id'=>$model->id]) }}" enctype="multipart/form-data">
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
                        <option @selected($model->status === $model) value="{{ $value }}"> {{ $status }}</option>
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

            <div class="row">
                <div class="col-3">
                    <input name="image" type="file" class="custom-file-input d-none" id="inputGroupFile01" accept="image/*" onchange="loadFile(event)">
                    <label for="inputGroupFile01">
                          <img id="output" src="{{asset($model->getFirstMediaUrl('models'))}}" class="w-100" alt="{{$brand->name}}">
                    </label>
                </div>
            </div>
            <div class="form-group">
                <input type="checkbox" name="resize" @checked(old('change')==='true') id="resize">
                <label for="resize">تغيير ابعاد الصورة</label>
                <div class="row d-none" id="resizebox">
                    <div class="col-2">
                        <small class="form-text text-muted">ادخل عرض الصورة المطلوب</small>
                        <input type="number" name="width" value="{{old('width')}}">
                    </div>
                    <div class="col-2">
                        <small class="form-text text-muted">ادخل طول الصورة المطلوب</small>
                        <input type="number" name="heigth" value="{{old('heigth')}}">
                    </div>
                </div>
            </div>
            <button type="submit" name="edit" class="btn btn-primary">تعديل </button>
        </form>
    </div>

@endsection
@push('js')
    <script>
        var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
        };
    </script>
@endpush
@push('js')
  <script>
      $('#resize').on('change',function(){
        $('#resizebox').toggleClass('d-none');
      });
  </script>
@endpush
