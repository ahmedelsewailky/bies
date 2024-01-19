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
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0"><i class="fa fa-list mr-2"></i> جدول الأقسام</h6>
        <a href="{{ route('category.create') }}" class="btn btn-outline-primary">إضافة قسم جديد</a>
    </div>

    <div class="row">
        @foreach ($parents as $parent)
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 mr-3">
                                <img src="{{ asset('dashboard/dist/img/icons\\') . $parent->icon }}" width="40"
                                    alt="{{ $parent->name }}">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-semibold mb-0">{{ $parent->name }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @forelse ($categories as $category)
                            <div class="d-flex">
                                <h6>{{ $category->name }}</h6>
                                <span>28</span>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                            <path
                                                d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted text-center m-0">لا يوجد أقسام</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
