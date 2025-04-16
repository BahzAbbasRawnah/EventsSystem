@extends('layouts.app')

@section('content')
<div class="container p-2">
    <div class="row justify-content-center m-2 m-md-0">
        <div class="col-md-4 border border-primary rounded-3 p-3">
            <div class="card">
                <div class="card-header text-center">
                    <h3>{{ __('pages.edit_profile') }}</h3>
                </div>

                <div class="card-body">
                    <!-- Profile Update Form -->
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-user text-primary mx-2"></i>{{ __('pages.full_name') }}
                            </label>
                            <input type="text" class="form-control text-dark" id="name" name="name" 
                                   value="{{ $user->name }}" placeholder="{{ __('pages.full_name_placeholder') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope text-primary mx-2"></i>{{ __('pages.email') }}
                            </label>
                            <input type="email" class="form-control text-dark" id="email" name="email" 
                                   value="{{ $user->email }}" placeholder="{{ __('pages.email_placeholder') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mx-2"></i>{{ __('pages.update_profile') }}
                        </button>
                    </form>

                    <hr>

                    <!-- Password Update Form -->
                    <form method="POST" action="{{ route('profile.update.password') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">
                                <i class="fas fa-lock text-primary mx-2"></i>{{ __('pages.current_password') }}
                            </label>
                            <input type="password" class="form-control text-dark" id="current_password" name="current_password" 
                                   placeholder="{{ __('pages.current_password') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-key text-primary mx-2"></i>{{ __('pages.new_password') }}
                            </label>
                            <input type="password" class="form-control text-dark" id="password" name="password" 
                                   placeholder="{{ __('pages.new_password') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">
                                <i class="fas fa-check-circle text-primary mx-2"></i>{{ __('pages.confirm_password') }}
                            </label>
                            <input type="password" class="form-control text-dark" id="password_confirmation" name="password_confirmation" 
                                   placeholder="{{ __('pages.confirm_password') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mx-2"></i>{{ __('pages.update_password') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
