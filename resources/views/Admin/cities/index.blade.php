@extends('layouts.admin')
@section('title','كل المدن')
@section('breadcrumb')
{{ Breadcrumbs::render('cities.index') }}
@endsection
@section('content')
<div class="col-12">
    <h1 class="h1 text-center text-dark"> المدن </h1>
</div>
    @if (can('Store Cities','admin'))
        <div class="col-12">
            <a href="{{ route('cities.create') }}" class="btn btn-primary rounded btn-sm"> أنشاء علامة تجارية </a>
        </div>
    @endif

<div class="col-12">
    <div class="table-responsive mt-15">
        <table class="table center-aligned-table mb-0">
            <thead>
                <tr class="text-dark">
                    <th>الرقم</th>
                    <th> أسم المدينة باللغة العربية</th>
                    <th> أسم المدينة باللغة الانجليزية</th>

                    <th>الحالة</th>
                    <th>تاريخ الانشاء</th>
                    <th>تاريخ التعديل</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cities as  $city)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$city->getTranslation('name' , 'ar')}}</td>
                        <td>{{$city->getTranslation('name' , 'en')}}</td>
                        <td><label class="badge badge-{{ $city->status == 1 ? 'success' : 'danger' }}">{{ $city->status == 1 ? 'مفعل' : 'غير مفعل' }}</label>
                        </td>
                        <td>{{ $city->created_at }}</td>
                        <td>{{ $city->updated_at }}</td>
                        <td>
                            @if (can('Update Cities','admin'))
                                <a href="{{route('cities.edit',$city->id)}}" class="btn btn-outline-primary btn-sm">تعديل</a>
                            @endif
                            @if (can('Destroy Cities','admin'))
                                <form action="{{route('cities.destroy',$city->id)}}" method="post" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-outline-danger btn-sm">حذف</button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="alert alert-warning font-weight-bold text-center">لايوجد علامات تجارية
                            حاليا</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
