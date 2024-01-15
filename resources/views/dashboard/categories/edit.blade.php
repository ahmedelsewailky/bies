{{-- Extend master layout --}}
@extends('layouts.app')

{{-- Define page title --}}
@section('title', 'الأقسام')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">تعديل بيانات قسم</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">الأقسام</a></li>
            <li class="breadcrumb-item active">تعديل بيانات قسم</li>
        </ol>
    </div><!-- /.col -->
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <div class="card-header">
            <h6>تعديل بيانات قسم: {{ $category->name }}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Name --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-3 col-form-label">اسم القسم</label>
                            <div class="col-md-9">
                                <input type="text" id="name" name="name" value="{{ old('name') ?? $category->name }}"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="parent_id" class="col-md-3 col-form-label">نوع القسم</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <label for="main" class="form-check-label">
                                            <input type="radio" name="categoryType" id="main"
                                                class="form-check-input" {{ !$category->parent_id ? 'checked' : false }}>
                                            قسم رئيسي
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="sub" class="form-check-label">
                                            <input type="radio" name="categoryType" id="sub"
                                                class="form-check-input" {{ $category->parent_id ? 'checked' : false }}>
                                            قسم فرعي
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Parent --}}
                        <div class="row mb-3 show {{ $category->parent_id ? false : 'd-none' }}" id="parentCategory">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <select id="parent_id" name="parent_id"
                                    class="form-control @error('parent_id') is-invalid @enderror">
                                    <option value="">-- حدد القسم الرئيسي --</option>
                                    @foreach ($categories as $cate)
                                        <option value="{{ $cate->id }}" {{ $category->parent_id == $cate->id ? 'selected' : false }}>{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="row mb-3 show {{ !$category->parent_id ? false : 'd-none' }}" id="categoryImage">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <input type="file" id="icon" name="icon"
                                    class="form-control @error('icon') is-invalid @enderror">
                                @error('icon')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @else
                                    <ul class="mt-3">
                                        <li>يتم اضافة ايقونة للأقسام الرئيسية فقط.</li>
                                        <li>الحجم المثالي لأيقونة القسم هي 64 بيكسل</li>
                                        <li>يمكنك تنزيل ايقونات للأقسام من الرابط التالي: <a href="https://www.flaticon.com/"
                                                target="_blank" class="text-link">Flaticons</a></li>
                                    </ul>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $('input[type="radio"]').click(function() {
                $('.show').toggleClass("d-none");
            });
        });
    </script>
@endsection
