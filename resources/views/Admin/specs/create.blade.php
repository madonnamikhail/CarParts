@php
$oldInputs = session()->getOldInput();
@endphp
@extends('layouts.admin')
@section('title', ' إنشاء صفات منتج')
@section('breadcrumb')
    {{ Breadcrumbs::render('specs.create') }}
@endsection
@push('css')


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark"> @yield('title') </h1>
    </div>
    @include('includes.validation-errors')
    <div class="col-12">
        <form method="post" action="{{ route('specs.store') }}" id="form">
            @csrf
            <div class="repeater">
                <div data-repeater-list="specs">
                    @if (isset($oldInputs['specs']))
                        @foreach ($oldInputs['specs'] as $spec)
                            <div data-repeater-item class="my-3">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="text"> الصفة باللغة الانجليزية</label>
                                        <input type="text" name="en" value="{{ $spec['en'] }}"
                                            class="form-control" id="text">
                                    </div>
                                    <div class="col-3">
                                        <label for="text"> الصفة باللغة العربية</label>
                                        <input type="text" name="ar" value="{{ $spec['ar'] }}"
                                            class="form-control" id="text">
                                    </div>
                                    <div class="col-3">
                                        <label for="js-example-basic-hide-search-multi">القسم</label>
                                        <select name="category_id" class="form-control select2" multiple>
                                            @foreach ($subcategories as $sub)
                                                <option @selected(in_array($sub->id,$spec['category_id'])) value="{{ $sub->id }}">
                                                    {{ $sub->getTranslation('name', 'en') }} -
                                                    {{ $sub->getTranslation('name', 'ar') }} </option>
                                            @endforeach
                                        </select>
                                        {{-- <small class="text-warning font-weight-bold"> ctrl+click لأختيار أكثر من قسم --}}
                                        </small>
                                    </div>
                                    <div class="col-3">
                                        <label for=""> </label>
                                        <input class="btn btn-danger btn-lg form-control" data-repeater-delete
                                            type="button" value="مسح الصفة " />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div data-repeater-item class="my-3">
                            <div class="row">
                                <div class="col-3">
                                    <label for="text"> الصفة باللغة الانجليزية</label>
                                    <input type="text" name="en" class="form-control" id="text">
                                </div>
                                <div class="col-3">
                                    <label for="text"> الصفة باللغة العربية</label>
                                    <input type="text" name="ar" class="form-control" id="text">
                                </div>
                                <div class="col-3">
                                    <label>القسم</label>
                                    <select name="category_id" class="form-control select2" multiple>
                                        @foreach ($subcategories as $sub)
                                            <option value="{{ $sub->id }}">
                                                {{ $sub->getTranslation('name', 'en') }} -
                                                {{ $sub->getTranslation('name', 'ar') }} </option>
                                        @endforeach
                                    </select>
                                    <small class="text-warning font-weight-bold"> ctrl+click لأختيار أكثر من قسم
                                    </small>
                                </div>
                                <div class="col-3">
                                    <label for=""> </label>
                                    <input class="btn btn-danger btn-lg form-control" data-repeater-delete type="button"
                                        value="مسح الصفة " />
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <input class="button btn-success btn-lg my-5" id="add" data-repeater-create type="button"
                    value="أَضافة صفة جديدة " />
            </div>
            @include('includes.create-submit-buttons')
        </form>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/admin/js/select2.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2({
                allowClear: true,
            });
            $('.repeater, .repeater-file, .repeater-add').repeater({
                show: function() {
                    $(this).show(function() {
                        $(this).slideDown();
                        $('.select2-container').remove();
                        $(".select2").select2({
                            allowClear: true
                        });
                        $('.select2-container').width("100%");
                    });
                },
                hide: function(remove) {
                    if (confirm('Confirm Question')) {
                        $(this).slideUp(remove);
                    }
                }
            });
        });
    </script>
@endpush
