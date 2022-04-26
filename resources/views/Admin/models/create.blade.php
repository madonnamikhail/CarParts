@extends('layouts.admin')
@section('title', 'انشاء موديل')
@section('breadcrumb')
{{ Breadcrumbs::render('models.create') }}
@endsection
@push('css')
{{-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">انشاء موديل</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('models.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="font-weight-bold"> اسم الموديل باللغة الانجليزية</label>
                <input type="name" name="name[en]" value="{{old('name.en')}}" class="form-control" id="name" placeholder=" ادخل اسم الموديل الانجليزي">
                <small id="name" class="form-text text-muted">اسم الموديل الانجليزي يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="name" class="font-weight-bold"> اسم الموديل باللغة العربية</label>
                <input type="name" name="name[ar]" value="{{old('name.ar')}}" class="form-control" id="name" placeholder=" ادخل اسم الموديل العربي">
                <small id="name" class="form-text text-muted">اسم الموديل العربي يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="year" class="font-weight-bold">سنة الموديل</label>
                <input type="text" name="year" value="{{old('year')}}" class="form-control" id="datepicker" placeholder="ادخل اسم الموديل ">
                <small id="datepicker" class="form-text text-muted">اسم الموديل يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="status" class="font-weight-bold">حالة الموديل</label>
                <select name="status" class="custom-select" id="status">
                    <option selected disabled>احتر حالة الموديل</option>
                    @foreach ($statuses as $status => $value)
                        <option @selected(old('status') === $value) value="{{ $value }}"> {{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brand_id" class="font-weight-bold">العلامة التجارية</label>
                <select name="brand_id" class="custom-select" id="status">
                    <option selected disabled>احتر العلامة التجارية</option>
                    @foreach ($brands as $brand)
                        <option @selected(old('brand_id') == $brand->id) value="{{ $brand->id }}"> {{ $brand->getTranslation('name', 'ar') }} -- {{ $brand->getTranslation('name', 'en') }}</option>
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
                <input type="checkbox" name="resize" @checked(old('change')==='true') id="resize" value="exist">
                <label for="resize">تغيير ابعاد الصورة</label>
                <div class="row d-none" id="resizebox">
                    <div class="col-2">
                        <small class="form-text text-muted">ادخل عرض الصورة المطلوب</small>
                        <input type="number" name="width" value="{{old('width')}}">
                    </div>
                    <div class="col-2">
                        <small class="form-text text-muted">ادخل طول الصورة المطلوب</small>
                        <input type="number" name="height" value="{{old('height')}}">
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
@push('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script>

    $("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
</script>
@endpush
