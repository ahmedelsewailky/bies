{{-- Extend master auth layoyt --}}
@extends('layouts.auth')

{{-- Page title --}}
@section('title', 'تسجيل عضو جديد')

{{-- Page content --}}
@section('content')
<div class="page-wrapper">
    <div class="wrap-inner register-wrap-inner">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('website') }}">
                    <img src="{{ asset('logo.png') }}" alt="{{ env('APP_NAME') }}">
                </a>
            </div>
        </nav>

        <div class="form-area">
            <form class="auth-form auth-register-form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">اسم المستخدم</label>

                    <input id="name"
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        name="name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        placeholder="john_doe"
                        required
                        autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>

                    <input id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="example@email.com"
                        required
                        autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">كلمة المرور</label>

                    <input id="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        placeholder="********"
                        required
                        autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="form-label">تأكيد كلمة المرور</label>

                    <input id="password-confirm"
                        type="password"
                        class="form-control"
                        name="password_confirmation"
                        placeholder="********"
                        required
                        autocomplete="new-password">
                </div>

                <div class="mb-0">
                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            إنشاء حساب
                        </button>

                        <a class="btn btn-link" href="{{ route('login') }}">
                            تملك حساباً بالفعل؟
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
