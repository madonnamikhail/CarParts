@extends('layouts.admin')
@section('title', 'انشاء علامة تجارية')
@section('breadcrumb')
{{ Breadcrumbs::render('brands.create') }}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">انشاء علامة تجارية</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('brands.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name"> اسم العلامة التجارية باللغة الانجليزية</label>
                <input type="name" name="name[en]" value="{{old('name.en')}}" class="form-control" id="name" placeholder="ادخل اسم العلامة التجارية">
                <small id="name" class="form-text text-muted">اسم العلامة التجارية الانجليزية يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="name"> اسم العلامة التجارية باللغة العربية</label>
                <input type="name" name="name[ar]" value="{{old('name.ar')}}" class="form-control" id="name" placeholder="ادخل اسم العلامة التجارية">
                <small id="name" class="form-text text-muted">اسم العلامة التجارية العربية يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="status">حالة العلامة التجارية </label>
                <select name="status" class="custom-select" id="status">
                    <option selected disabled>احتر حالة العلامة التجارية</option>
                    @foreach ($statuses as $status => $value)
                        <option @selected(old('status') === $value) value="{{ $value }}"> {{ $status }}</option>
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
