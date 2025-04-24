@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card-custom auth-card">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold mb-1">{{ __('pages.welcome_back') }}</h2>
                        <p class="text-gray">{{ __('pages.login_subtitle') }}</p>
                    </div>
                    
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <form action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('pages.email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope text-primary"></i></span>
                                <input type="email" class="form-control form-control-custom @error('email') is-invalid @enderror" 
                                       id="email" name="email" placeholder="{{ __('pages.email_placeholder') }}" 
                                       value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label for="password" class="form-label mb-0">{{ __('pages.password') }}</label>
                                <a href="{{ route('password.forgot') }}" class="text-primary small">{{ __('pages.forgot_password') }}</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-lock text-primary"></i></span>
                                <input type="password" class="form-control form-control-custom @error('password') is-invalid @enderror" 
                                       id="password" name="password" placeholder="{{ __('pages.password_placeholder') }}" required>
                                <button class="btn btn-light border password-toggle" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    {{ __('pages.remember_me') }}
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn-custom btn-primary w-100 py-3 mb-4">
                            {{ __('pages.login') }}
                        </button>
                        
                        <div class="text-center">
                            <p class="mb-0">{{ __('pages.no_account') }} <a href="{{ route('register') }}" class="text-primary">{{ __('pages.register_here') }}</a></p>
                        </div>
                    </form>
                    
                    <div class="divider my-4">
                        <span>{{ __('pages.or_login_with') }}</span>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col">
                            <a href="#" class="btn-custom btn-outline-secondary w-100">
                                <i class="fab fa-google me-2"></i> Google
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="btn-custom btn-outline-secondary w-100">
                                <i class="fab fa-facebook-f me-2"></i> Facebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('.password-toggle');
        const password = document.querySelector('#password');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle icon
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    });
</script>
@endsection
