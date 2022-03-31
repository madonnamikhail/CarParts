@extends('layouts.admin')
@section('title','كل الموديلات')
@section('content')
<div class="col-12">
    <h1 class="h1 text-center text-dark"> الموديلات </h1>
</div>
<div class="col-12">
    <a href="{{ route('models.create') }}" class="btn btn-primary rounded btn-sm"> أنشاء موديل جديد </a>
</div>
<div class="col-12">
    <div class="table-responsive mt-15">
        <table class="table center-aligned-table mb-0">
            <thead>
                <tr class="text-dark">
                    <th>الرقم</th>
                    <th>أسم الموديل</th>
                    <th>سنة الموديل</th>
                    <th>اسم العلامة التجارية</th>
                    <th>الحالة</th>
                    <th>تاريخ الانشاء</th>
                    <th>تاريخ التعديل</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($models as  $model)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $model->name }}</td>
                        <td>{{ $model->year }}</td>
                        <td>
                            @foreach ($brands as $brand )
                                @if ($brand->id == $model->brand_id)
                                    {{$brand->name}}
                                @endif
                            @endforeach
                        </td>
                        <td><label class="badge badge-{{ $model->status == 1 ? 'success' : 'danger' }}">{{ $model->status == 1 ? 'مفعل' : 'غير مفعل' }}</label>
                        </td>
                        <td>{{ $model->created_at }}</td>
                        <td>{{ $model->updated_at }}</td>
                        <td><a href="{{route('models.edit',['id' => $model->id])}}" class="btn btn-outline-primary btn-sm">تعديل</a>
                            <form action="{{route('models.destroy',['id' => $model->id])}}" method="post" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-outline-danger btn-sm">حذف</button>
                            </form>
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
