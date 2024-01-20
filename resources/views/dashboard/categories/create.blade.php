{{-- Extend master layout --}}
@extends('layouts.app')

{{-- Define page title --}}
@section('title', 'الأقسام')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">إضافة قسم جديد</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">الأقسام</a></li>
            <li class="breadcrumb-item active">إضافة قسم جديد</li>
        </ol>
    </div><!-- /.col -->
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <div class="card-header">
            <h6>نموذج إضافة قسم جديد للموقع</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">

                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- Name --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-3 col-form-label">اسم القسم</label>
                            <div class="col-md-9">
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Parent --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-3 col-form-label">القسم الرئيسي</label>
                            <div class="col-md-9">
                                <select id="parent_id" name="parent_id"
                                    class="form-control @error('parent_id') is-invalid @enderror">
                                    <option value="" hidden>-- حدد القسم الرئيسي --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : false }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">إضافة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
