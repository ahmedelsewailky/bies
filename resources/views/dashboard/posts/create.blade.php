{{-- Extend master layout --}}
@extends('layouts.app')

{{-- Define page title --}}
@section('title', 'المنشورات')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">إضافة منشور جديد</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">المنشورات</a></li>
            <li class="breadcrumb-item active">إضافة منشور جديد</li>
        </ol>
    </div><!-- /.col -->
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <div class="card-header">
            <h6>نموذج إضافة منشور</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{ route('posts.store') }}" method="post">
                        @csrf
                        {{-- Name --}}
                        <div class="row mb-3">
                            <label for="title" class="col-md-3 col-form-label">عنوان المنشور</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Category --}}
                        <div class="row mb-3">
                            <label for="category_id" class="col-md-3 col-form-label">القسم</label>
                            <div class="col-md-9">
                                <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">--اختار--</option>
                                    @foreach (\App\Models\Category::get() as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Year --}}
                        <div class="row mb-3">
                            <label for="year" class="col-md-3 col-form-label">سنة الإنتاج</label>
                            <div class="col-md-9">
                                <select id="year" name="year" class="form-control @error('year') is-invalid @enderror">
                                    <option value="">--اختار--</option>
                                    @for ($i = date('Y'); $i >= 1900; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('year')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mb-3">
                            <label for="description" class="col-md-3 col-form-label">الوصف</label>
                            <div class="col-md-9">
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                                @error('description')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="row mb-3">
                            <label for="image" class="col-md-3 col-form-label">الصورة التوضيحية</label>
                            <div class="col-md-9">
                                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Actress --}}
                        <div class="row mb-3">
                            <label for="actress" class="col-md-3 col-form-label">الممثلين</label>
                            <div class="col-md-9">
                                <select id="actress" name="actress" class="form-control select2 @error('actress') is-invalid @enderror" multiple>
                                    <option value="">--اختار--</option>
                                    @foreach (\App\Models\Actress::get() as $actress)
                                        <option value="{{ $actress->id }}">{{ $actress->name }}</option>
                                    @endforeach
                                </select>
                                @error('actress')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">حفظ ونشر</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Required for this page --}}
@section('css')
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2/css/select2.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('dashboard/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(function() {
            $(".select2").select2();
        });
    </script>
@endsection
