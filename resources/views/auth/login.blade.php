@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h3 class="text-center mb-1">Welcome Back</h3>
                <p class="text-center text-muted mb-4">Sign in to Officer Management</p>
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button class="btn btn-primary w-100">Login</button>
                </form>
                <p class="text-center mt-3 mb-0">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
