@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-primary to-accent  py-5 mb-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ __('pages.edit_profile') }}</h1>
                <p class="lead mb-0">{{ __('pages.edit_profile_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
    <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card-custom sticky-lg-top p-2" style="top: 100px; z-index: 10;">
                <div class="profile-sidebar">
                    <div class="profile-image">
                        @if($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle">
                        @else
                            <div class="profile-avatar">
                                <span>{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="profile-info text-center">
                        <h4 class="mb-1">{{ $user->name }}</h4>
                        <p class="text-gray mb-3">{{ $user->email }}</p>
                        <p class="badge bg-primary">{{ ucfirst($user->role) }}</p>
                    </div>
                    
                    <hr>
                    
                    <div class="profile-menu">
                        <a href="{{ route('profile.show') }}" class="profile-menu-item">
                            <i class="fas fa-user"></i>
                            <span>{{ __('pages.profile_info') }}</span>
                        </a>
                        <a href="{{ route('bookings') }}" class="profile-menu-item">
                            <i class="fas fa-ticket-alt"></i>
                            <span>{{ __('pages.my_bookings') }}</span>
                        </a>
                        <a href="{{ route('profile.edit') }}" class="profile-menu-item active">
                            <i class="fas fa-cog"></i>
                            <span>{{ __('pages.account_settings') }}</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="profile-menu-item text-danger bg-transparent w-100 ">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>{{ __('pages.logout') }}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="col-lg-8">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <!-- Profile Information Form -->
            <div class="card-custom mb-4 p-2">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('pages.profile_information') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="profile_picture" class="form-label">{{ __('pages.profile_picture') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-image text-primary"></i></span>
                                        <input type="file" class="form-control form-control-custom @error('profile_picture') is-invalid @enderror" 
                                               id="profile_picture" name="profile_picture">
                                    </div>
                                    <div class="form-text">{{ __('pages.profile_picture_help') }}</div>
                                    @error('profile_picture')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">{{ __('pages.full_name') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                                        <input type="text" class="form-control form-control-custom @error('name') is-invalid @enderror" 
                                               id="name" name="name" value="{{ old('name', $user->name) }}" required>
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
                                               id="email" name="email" value="{{ old('email', $user->email) }}" required>
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
                                               id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                    </div>
                                    @error('phone')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn-custom btn-primary">
                                    <i class="fas fa-save me-2"></i> {{ __('pages.save_changes') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Change Password Form -->
            <div class="card-custom p-2">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('pages.change_password') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update.password') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="current_password" class="form-label">{{ __('pages.current_password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-lock text-primary"></i></span>
                                        <input type="password" class="form-control form-control-custom @error('current_password') is-invalid @enderror" 
                                               id="current_password" name="current_password" required>
                                    </div>
                                    @error('current_password')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-label">{{ __('pages.new_password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-lock text-primary"></i></span>
                                        <input type="password" class="form-control form-control-custom @error('password') is-invalid @enderror" 
                                               id="password" name="password" required>
                                    </div>
                                    @error('password')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">{{ __('pages.confirm_new_password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-lock text-primary"></i></span>
                                        <input type="password" class="form-control form-control-custom" 
                                               id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn-custom btn-primary">
                                    <i class="fas fa-key me-2"></i> {{ __('pages.update_password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
