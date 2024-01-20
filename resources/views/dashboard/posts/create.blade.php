{{-- Extend master layout --}}
@extends('layouts.app')

{{-- Define page title --}}
@section('title', 'المنشورات')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">
            إضافة منشور جديد
        </h1>
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
            <div class="d-flex align-items-start">
                @if (request()->has('type'))
                    @if (request()->get('type') == 'aflam')
                        <h6>نموذج إضافة فيلم</h6>
                    @elseif (request()->get('type') == 'mslslat')
                        <h6>نموذج إضافة مسلسل</h6>
                    @elseif (request()->get('type') == 'bramg')
                        <h6>نموذج إضافة برنامج</h6>
                    @else
                        <h6>نموذج إضافة بودكاست</h6>
                    @endif
                    <a href="{{ route('posts.create') }}" title="اضف نوع اخر">
                        <i class="fa fa-arrow-right ml-3"></i>
                    </a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if (request()->has('type'))
                            @include('dashboard.posts.forms._' . request()->get('type'))
                        @else
                            <h6 class="mb-5">يرجي تحديد فئة المنشور المراد اضافته اولاً</h6>
                            <div class="row type-post-modal">
                                <div class="col-12 col-md-3">
                                    <div class="thumbnail">
                                        <a href="{{ route('posts.create') }}?type=aflam">
                                            <img src="{{ asset('dashboard/dist/img/icons/افلام.png') }}" alt="Movies icon">
                                            <h6>فيلم</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="thumbnail">
                                        <a href="{{ route('posts.create') }}?type=mslslat">
                                            <img src="{{ asset('dashboard/dist/img/icons/مسلسلات.png') }}" alt="Movies icon">
                                            <h6>مسلسل</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="thumbnail">
                                        <a href="{{ route('posts.create') }}?type=bramg">
                                            <img src="{{ asset('dashboard/dist/img/icons/برامج.png') }}" alt="Movies icon">
                                            <h6>برنامج</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="thumbnail">
                                        <a href="{{ route('posts.create') }}?type=bodkast">
                                            <img src="{{ asset('dashboard/dist/img/icons/بودكاست.png') }}"
                                                alt="Movies icon">
                                            <h6>بودكاست</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
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
