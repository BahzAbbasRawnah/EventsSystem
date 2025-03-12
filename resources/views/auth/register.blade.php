@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h2><i class="fas fa-user-plus mx-2"></i>{{ __('pages.register') }}</h2>
                </div>
                <div class="card-body p-3">
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label text-dark">
                                <i class="fas fa-user mx-2"></i>{{ __('pages.full_name') }}
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" placeholder="{{ __('pages.full_name_placeholder') }}" 
                                   value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label text-dark">
                                <i class="fas fa-envelope mx-2"></i>{{ __('pages.email') }}
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" placeholder="{{ __('pages.email_placeholder') }}" 
                                   value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                             <!-- Phone -->
                             <div class="mb-4">
                                <label for="phone" class="form-label text-dark">
                                    <i class="fas fa-phone mx-2"></i>{{ __('pages.mobile') }}
                                </label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       id="email" name="phone" placeholder="{{ __('pages.mobile_placeholder') }}" 
                                       value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label text-dark">
                                <i class="fas fa-lock mx-2"></i>{{ __('pages.password') }}
                            </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" placeholder="{{ __('pages.password_placeholder') }}" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label text-dark">
                                <i class="fas fa-lock mx-2"></i>{{ __('pages.confirm_password') }}
                            </label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" 
                                   placeholder="{{ __('pages.confirm_password_placeholder') }}" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-user-plus mx-2"></i>{{ __('pages.register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Login Link -->
            <div class="text-center mt-4">
                <p class="text-dark">{{ __('pages.have_account') }} 
                    <a href="{{ route('login') }}" class="text-primary">{{ __('pages.login_here') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
