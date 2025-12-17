@extends('layouts.welcome')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #0f172a, #1e3a8a);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-container {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .login-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        padding: 40px 30px;
        width: 100%;
        max-width: 500px;
    }
    .login-title {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 30px;
        color: #0f172a;
        text-align: center;
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        border-color: #0d6efd;
    }
    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
        font-weight: bold;
    }
    .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0a58ca;
    }
    .register-link {
        text-align: left;
        margin-top: 20px;
        font-size: 14px;
    }
</style>

<div class="login-container">
    @if (Route::has('login'))
        @auth
            <div class="text-center text-white">
                <h1>Welcome Back, {{ auth()->user()->name }}</h1>
                <a href="{{ url('/home') }}" class="btn btn-light mt-3">Home</a>
            </div>
        @else
        <div class="login-card">
                        <div class="login-title">{{ __('OUR-Library') }}</div>
            <div class="login-title">{{ __('Please Login to Access the Library') }}</div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label text-secondary">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <div class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label text-secondary">{{ __('Password') }}</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                    @error('password')
                        <div class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="d-grid gap-2 mb-2">
                    <button type="submit" class="btn btn-primary py-2">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="register-link text-secondary">
                    Don't have an account? <a href="{{ route('register') }}" style="text-decoration: none; color: #0d6efd; font-weight: bold;">Register here</a>
                </div>

                <div class="text-center mt-4">
                    <small class="text-muted">By: <a target="_blank" style="text-decoration: none; color: #6c757d;">OUR-Library</a></small>
                </div>
            </form>
        </div>
        @endauth
    @endif
</div>
@endsection