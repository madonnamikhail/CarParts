@extends('layouts.admin')
@section('title', 'انشاء موديل')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">انشاء موديل</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('models.store') }}" enctype="multipart/form-data">
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


            <div class="row">
                <div class="col-3">
                    <input type="file" name="image" class="custom-file-input d-none" id="inputGroupFile01" accept="image/*" onchange="loadFile(event)">
                    <label for="inputGroupFile01">
                          <img id="output" src="{{asset('default/default.jpg')}}" class="w-50 mb-1" alt="" id="output">
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
            @include('includes.create-submit-buttons')
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
