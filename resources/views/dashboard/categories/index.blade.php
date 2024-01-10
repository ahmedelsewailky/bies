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
    <h3>Catgeory</h3>
@endsection
