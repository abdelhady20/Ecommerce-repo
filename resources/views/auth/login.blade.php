@extends('website.layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4">
                        <h4 class="mb-4 text-center">Customer Login</h4>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>

                        <p class="text-center mt-3">
                            Don't have an account? <a href="{{ route('register.form') }}">Register</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
