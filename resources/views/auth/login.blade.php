@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-center py-4">
                    <h2 class="text-white"><i class="fas fa-sign-in-alt mx-2 text-white"></i>{{ __('pages.login') }}</h2>
                </div>
                <div class="card-body p-5">
                    <!-- Display Authentication Errors -->
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('authenticate') }}" method="POST">
                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label ">
                                <i class="fas fa-envelope mx-2 text-primary"></i>{{ __('pages.email') }}
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" placeholder="{{ __('pages.email_placeholder') }}" 
                                   value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label ">
                                <i class="fas fa-lock mx-2 text-primary"></i>{{ __('pages.password') }}
                            </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" placeholder="{{ __('pages.password_placeholder') }}" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label " for="remember">
                                {{ __('pages.remember_me') }}
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt mx-2 text-white"></i>{{ __('pages.login') }}
                            </button>
                        </div>

                        <!-- Forgot Password -->
                        <div class="text-center mt-3">
                            <a href="{{ route('password.forgot') }}" >{{ __('pages.forgot_password') }}</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Register Link -->
            <div class="text-center mt-4">
                <p >
                    {{ __('pages.no_account') }} 
                    <a href="{{ route('register') }}" >{{ __('pages.register_here') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
