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
        {{-- <div class="card-header">
            <div class="d-flex align-items-start">
                @if (request()->has('type'))
                    @if (request()->get('type') == 'movie')
                        <h6>نموذج إضافة فيلم</h6>
                    @elseif (request()->get('type') == 'series')
                        <h6>نموذج إضافة مسلسل</h6>
                    @elseif (request()->get('type') == 'program')
                        <h6>نموذج إضافة برنامج</h6>
                    @else
                        <h6>نموذج إضافة بودكاست</h6>
                    @endif
                    <a href="{{ route('posts.create') }}" title="اضف نوع اخر">
                        <i class="fa fa-arrow-right ml-3"></i>
                    </a>
                @endif
            </div>
        </div> --}}
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
                                    يرجي العلم أنه لا يمكنك تغيير عنوان المقال او القسم الخاص بها لأن ذلك سوف يؤثر في عملية
                                    أرشفة المقال، ولعمل ذلك
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
