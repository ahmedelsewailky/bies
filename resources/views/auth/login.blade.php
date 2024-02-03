{{-- Extend master layout --}}
@extends('layouts.auth')

{{-- Page title --}}
@section('title', 'تسجيل الدخول')

{{-- Page content --}}
@section('content')
<div class="page-wrapper">
    <div class="wrap-inner login-wrap-inner">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('website') }}">
                    <img src="{{ asset('logo.png') }}" alt="{{ env('APP_NAME') }}">
                </a>
            </div>
        </nav>

        <form class="auth-form auth-login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">بريدك الإلكتروني</label>
                <input id="login"
                    type="text"
                    class="form-control @error('login') is-invalid @enderror"
                    name="login"
                    value="{{ old('login') }}"
                    required autocomplete="login"
                    placeholder="ادخل بريدك الإلكتروني"
                    autofocus>

                @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">كلمة السر</label>
                <input id="password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    required
                    placeholder="كلمة المرور"
                    autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-check-label" for="remember">
                    <input class="form-check-input ms-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    تذكرني
                </label>
            </div>

            <div class="mb-3 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">تسجيل الدخول</button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        هل نسيت كلمة المرور؟
                    </a>
                @endif
            </div>

            <div class="text-end">
                <p>هل لا تملك حساب؟<a href="{{ route('register') }}" class="btn btn-link"> حساب جديد</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
