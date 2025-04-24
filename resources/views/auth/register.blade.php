@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card-custom auth-card">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold mb-1">{{ __('pages.create_account') }}</h2>
                        <p class="text-gray">{{ __('pages.register_subtitle') }}</p>
                    </div>
                    
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
                    
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="form-label">{{ __('pages.full_name') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                                        <input type="text" class="form-control form-control-custom @error('name') is-invalid @enderror" 
                                               id="name" name="name" placeholder="{{ __('pages.full_name_placeholder') }}" 
                                               value="{{ old('name') }}" required>
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
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
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">{{ __('pages.mobile') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-phone text-primary"></i></span>
                                        <input type="tel" class="form-control form-control-custom @error('phone') is-invalid @enderror" 
                                               id="phone" name="phone" placeholder="{{ __('pages.mobile_placeholder') }}" 
                                               value="{{ old('phone') }}" required>
                                    </div>
                                    @error('phone')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-label">{{ __('pages.password') }}</label>
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
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">{{ __('pages.confirm_password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-lock text-primary"></i></span>
                                        <input type="password" class="form-control form-control-custom" 
                                               id="password_confirmation" name="password_confirmation" 
                                               placeholder="{{ __('pages.confirm_password_placeholder') }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        {{ __('pages.agree_terms') }} <a href="#" class="text-primary">{{ __('pages.terms_and_conditions') }}</a>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn-custom btn-primary w-100 py-3 mb-4">
                                    {{ __('pages.create_account') }}
                                </button>
                                
                                <div class="text-center">
                                    <p class="mb-0">{{ __('pages.have_account') }} <a href="{{ route('login') }}" class="text-primary">{{ __('pages.login_here') }}</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <div class="divider my-4">
                        <span>{{ __('pages.or_register_with') }}</span>
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
