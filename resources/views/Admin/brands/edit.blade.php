@extends('layouts.admin')
@section('title', "تعديل {$brand->name}")
@section('breadcrumb')
{{ Breadcrumbs::render('brands.edit',$brand) }}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('brands.update',$brand->id) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name"> اسم العلامة التجارية باللغة الانجليزية</label>
                <input type="name" name="name[en]" value={{$brand->getTranslation('name','en')}}  class="form-control" id="name" placeholder="ادخل اسم العلامة التجارية بالانجليزي">
                <small id="name" class="form-text text-muted">اسم العلامة التجارية بالانجليزي يجب ان يكون مميز و خاص بك </small>
            </div>
            <div class="form-group">
                <label for="name"> اسم العلامة التجارية باللغة العربية</label>
                <input type="name" name="name[ar]" value={{$brand->getTranslation('name','ar')}}  class="form-control" id="name" placeholder="ادخل اسم العلامة التجارية بالعربية">
                <small id="name" class="form-text text-muted">اسم العلامة التجارية بالعربية يجب ان يكون مميز و خاص بك </small>
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

            <div class="row">
                <div class="col-3">
                    <input name="image" type="file" class="custom-file-input d-none" id="inputGroupFile01" accept="image/*" onchange="loadFile(event)">
                    <label for="inputGroupFile01">
                          <img id="output" src="{{asset($brand->getFirstMediaUrl('brands'))}}" class="w-100" alt="{{$brand->name}}">
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
