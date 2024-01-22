{{-- Extend master layout --}}
@extends('layouts.app')

{{-- Define page title --}}
@section('title', 'المنشورات')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">
            تعديل منشور
        </h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">المنشورات</a></li>
            <li class="breadcrumb-item active">تعديل بيانات منشور</li>
        </ol>
    </div><!-- /.col -->
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="border border-warning p-3 rounded-lg mb-5">
                        <div class="d-flex">
                            <div class="flex-shrink-0 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24"
                                    style="fill: #FF9800">
                                    <path d="M11.001 10h2v5h-2zM11 16h2v2h-2z"></path>
                                    <path
                                        d="M13.768 4.2C13.42 3.545 12.742 3.138 12 3.138s-1.42.407-1.768 1.063L2.894 18.064a1.986 1.986 0 0 0 .054 1.968A1.984 1.984 0 0 0 4.661 21h14.678c.708 0 1.349-.362 1.714-.968a1.989 1.989 0 0 0 .054-1.968L13.768 4.2zM4.661 19 12 5.137 19.344 19H4.661z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0">
                                     لا يمكنك تغيير عنوان المقال لأن ذلك سوف يؤثر في عملية
                                    الأرشفة ، ولعمل ذلك
                                    <strong class="text-orange">قم بحذف المقال وإنشاءه من جديد</strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- Name --}}
                        <div class="row mb-3">
                            <label for="title" class="col-md-3 col-form-label">عنوان المنشور</label>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">{{ $post->title }}</p>
                            </div>
                        </div>

                        {{-- Category --}}
                        <div class="row mb-3">
                            <label for="category_id" class="col-md-3 col-form-label">القسم</label>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">{{ $post->category->name }}</p>
                            </div>
                        </div>

                        {{-- Year --}}
                        <div class="row mb-3">
                            <label for="year" class="col-md-3 col-form-label">سنة الإنتاج</label>
                            <div class="col-md-9">
                                <select id="year" name="year"
                                    class="form-control @error('year') is-invalid @enderror">
                                    <option value="">--اختار--</option>
                                    @for ($i = date('Y'); $i >= 1900; $i--)
                                        <option value="{{ $i }}" {{ $post->year == $i ? 'selected' : false }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                @error('year')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Quality --}}
                        <div class="row mb-3">
                            <label for="quality" class="col-md-3 col-form-label">الجودة</label>
                            <div class="col-md-9">
                                <select id="quality" name="quality"
                                    class="form-control @error('quality') is-invalid @enderror">
                                    <option value="">--اختار--</option>
                                    @foreach (DataArray::QUALITIES as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ $post->quality == $key ? 'selected' : false }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('quality')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mb-3">
                            <label for="description" class="col-md-3 col-form-label">وصف مختصر</label>
                            <div class="col-md-9">
                                <textarea name="description" maxlength="500" id="description" cols="30" rows="5" class="form-control">{{ $post->description }}</textarea>
                                @error('description')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="row mb-3">
                            <label for="image" class="col-md-3 col-form-label">الصورة التوضيحية</label>
                            <div class="col-md-9">
                                <input type="file" id="image" name="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Actress --}}
                        <div class="row mb-3">
                            <label for="actress" class="col-md-3 col-form-label">الممثلين</label>
                            <div class="col-md-9">
                                <select id="actress" name="actress[]"
                                    class="form-control select2 @error('actress') is-invalid @enderror" multiple>
                                    <option value="">--اختار--</option>
                                    @foreach (\App\Models\Actress::get() as $actress)
                                        <option value="{{ $actress->id }}"
                                            {{ old('actress') == $actress->id ? 'selected' : false }}>
                                            {{ $actress->name }}</option>
                                    @endforeach
                                </select>
                                @error('actress')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Download Links --}}
                        <div class="row mb-3">
                            <label for="link_1" class="col-md-3 col-form-label">روابط التحميل</label>
                            <div class="col-md-9">
                                <div class="download-link-inputs">
                                    <input type="text" id="link_1" name="links[]"
                                        class="form-control mb-3 @error('links.*') is-invalid @enderror">
                                </div>
                                @error('links.*')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <button type="button" id="add" class="btn btn-sm btn-default mt-3">اضف رابط
                                    آخر</button>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="row border-top pt-3 mt-3">
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

            $("#add").on("click", function() {
                let input =
                    `<input type="text" name="links[]" class="form-control mb-3 @error('links.*') is-invalid @enderror">`;
                $(".download-link-inputs").append(input);
            });
        });
    </script>
@endsection
