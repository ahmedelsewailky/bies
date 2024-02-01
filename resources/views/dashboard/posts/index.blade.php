{{-- Extend master layout --}}
@extends('layouts.app')

{{-- Define page title --}}
@section('title', 'المنشورات')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">المنشورات</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active">المنشورات</li>
        </ol>
    </div><!-- /.col -->
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h6 class="mb-0"><i class="fa fa-list mr-2"></i> جدول المنشورات</h6>
                <a href="#" data-toggle="modal" data-target="#typeOfPostModal" class="btn btn-outline-primary">إضافة
                    مشور جديد</a>
            </div>
        </div>
        <div class="card-body">
            <!-- Filter -->
            <div class="border p-4 mb-3">
                <h6 class="font-weight-bold">فلاتر العرض</h6>
                <form action="?" method="get">
                    <div class="row">
                        <!-- Categories -->
                        <div class="col-md-3">
                            <label for="category" class="form-label">القسم</label>
                            <select name="category" id="category" class="form-control">
                                <option value="" hidden>--اختار--</option>
                                @foreach (\App\Models\Category::whereNull('parent_id')->get() as $parent)
                                    <optgroup label="{{ $parent->name }}">
                                        @foreach (\App\Models\Category::whereParentId($parent->id)->get() as $category)
                                            <option value="{{ $category->id }}" {{ request()->get('category') == $category->id ? 'selected' : false }}>{{ $category->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>

                        <!-- Search Form -->
                        <div class="col-md-3">
                            <label for="search" class="form-label">بحث</label>
                            <input type="search" name="search" id="search" class="form-control"
                                placeholder="ابحث عن عنوان ما">
                        </div>

                        <!-- Submit Buttons -->
                        <div class="col-md-3 offset-3 align-self-end text-right">
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                    style="fill: #FFF">
                                    <path
                                        d="M21 3H5a1 1 0 0 0-1 1v2.59c0 .523.213 1.037.583 1.407L10 13.414V21a1.001 1.001 0 0 0 1.447.895l4-2c.339-.17.553-.516.553-.895v-5.586l5.417-5.417c.37-.37.583-.884.583-1.407V4a1 1 0 0 0-1-1zm-6.707 9.293A.996.996 0 0 0 14 13v5.382l-2 1V13a.996.996 0 0 0-.293-.707L6 6.59V5h14.001l.002 1.583-5.71 5.71z">
                                    </path>
                                </svg>
                                عرض النتائج
                            </button>

                            @if (request()->has('category'))
                                <a href="{{ route('posts.index') }}" class="btn btn-danger">حذف الفلاتر</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

            <!-- Posts Table -->
            <table class="table table-bordered table-hover posts-table">
                <thead class="bg-dark">
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>المشاهدات</th>
                        <th>التحميلات</th>
                        <th>الخيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 mr-3">
                                        <img src="{{ asset('storage\\') . $post->image }}" width="120" height="80"
                                            class="rounded-lg" alt="poster">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6><a href="">{{ $post->title }}</a></h6>
                                        <div class="d-flex">
                                            <span class="post-meta post-author">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgb(136, 136, 136);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                                                    </path>
                                                </svg>
                                                <a href="">{{ $post->user->name }}</a>
                                            </span>
                                            <span class="post-meta post-category ml-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgb(136, 136, 136);transform: ;msFilter:;">
                                                    <path
                                                        d="M2.165 19.551c.186.28.499.449.835.449h15c.4 0 .762-.238.919-.606l3-7A.998.998 0 0 0 21 11h-1V7c0-1.103-.897-2-2-2h-6.1L9.616 3.213A.997.997 0 0 0 9 3H4c-1.103 0-2 .897-2 2v14h.007a1 1 0 0 0 .158.551zM17.341 18H4.517l2.143-5h12.824l-2.143 5zM18 7v4H6c-.4 0-.762.238-.919.606L4 14.129V7h14z">
                                                    </path>
                                                </svg>
                                                <a href="">{{ $post->category->name }}</a>
                                            </span>
                                            <span class="post-meta post-date ml-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgb(136, 136, 136);transform: ;msFilter:;">
                                                    <path
                                                        d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z">
                                                    </path>
                                                    <path
                                                        d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z">
                                                    </path>
                                                </svg>
                                                {{ $post->created_at->diffForHumans() }}
                                            </span>
                                            <span class="post-meta post-rates ml-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" style="fill: #FF9800">
                                                    <path
                                                        d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                                                    </path>
                                                </svg>
                                                6
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    style="fill: rgb(136, 136, 136);transform: ;msFilter:;">
                                    <path
                                        d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z">
                                    </path>
                                </svg>
                                {{ number_format($post->views) }}
                            </td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    style="fill: rgb(136, 136, 136);transform: ;msFilter:;">
                                    <path d="m12 16 4-5h-3V4h-2v7H8z"></path>
                                    <path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path>
                                </svg>
                                0
                            </td>
                            <td>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-flex">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-success">تعديل</a>
                                    <button type="submit" onclick="confirm('هل ترغب في حذف هذا القسم بالفعل؟')"
                                        class="btn btn-sm btn-danger ml-1">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">لا توجد مشورات حتي الآن</td>
                        </tr>
                    @endforelse
                </tbody>
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>المشاهدات</th>
                        <th>التحميلات</th>
                        <th>الخيارات</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
