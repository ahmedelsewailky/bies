{{-- Extend master layout --}}
@extends('layouts.app')

{{-- Define page title --}}
@section('title', 'الأقسام')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">الأقسام</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active">الأقسام</li>
        </ol>
    </div><!-- /.col -->
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h6 class="mb-0"><i class="fa fa-list mr-2"></i> جدول الأقسام</h6>
                <a href="{{ route('category.create') }}" class="btn btn-outline-primary">إضافة قسم جديد</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم القسم</th>
                        <th>القسم الرئيسي</th>
                        <th>عدد المنشورات</th>
                        <th>الخيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->index }}</td>
                            <td>{{ $category->name }}</td>
                            <td></td>
                            <td>850</td>
                            <td>
                                <form action="{{ route('category.destroy', $category->id) }}" method="post" class="d-flex">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-success">تعديل</a>
                                    <button type="submit" onclick="confirm('هل ترغب في حذف هذا القسم بالفعل؟')" class="btn btn-sm btn-danger ml-1">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">لا توجد اقسام</td>
                    </tr>
                    @endforelse
                </tbody>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم القسم</th>
                        <th>القسم الرئيسي</th>
                        <th>عدد المنشورات</th>
                        <th>الخيارات</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
