@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h3 class="text-center mb-1">Create Account</h3>
                <p class="text-center text-muted mb-4">Register for Officer Management</p>
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input name="name" value="{{ old('name') }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <button class="btn btn-primary w-100">Register</button>
                </form>
                <p class="text-center mt-3 mb-0">Already registered? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
