{{-- Extend master auth layout --}}
@extends('layouts.auth')

{{-- Page title --}}
@section('title', 'تعيين كلمة المرور')

{{-- Page content --}}
@section('content')
<div class="page-wrapper">
    <div class="wrap-inner reset-password-wrap-inner">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('website') }}">
                    <img src="{{ asset('logo.png') }}" alt="{{ env('APP_NAME') }}">
                </a>
            </div>
        </nav>

        <div class="form-area">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="form-label text-md-end">بريدك الإكتروني</label>

                    <input id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required autocomplete="email"
                        autofocus
                        placeholder="ادخل بريدك الإلكتروني">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-0">
                    <button type="submit" class="btn btn-primary justify-content-center">
                        أرسل كود إعادة تعيين كلمة السر
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
