@extends('layouts.auth')

@section('title', 'login')

@section('content')
    <h4 class="mb-2">Welcome back! 👋</h4>
    <p class="mb-4">Please sign-in to your account and start the app</p>

    <form id="formAuthentication" class="mb-3" action="{{ route('auth.signin') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="Enter your email" value="{{ old('email') }}" autofocus />
            @error('email')
                <div class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 form-password-toggle">
            {{-- <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="">
                    <small>Forgot Password?</small>
                </a>
            </div> --}}
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @error('password')
                <div class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
        </div>
    </form>

    <p class="text-center">
        <span>New on our platform?</span>
        <a href="/auth/register">
            <span>Create an account</span>
        </a>
    </p>
@endsection
