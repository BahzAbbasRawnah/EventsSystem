@extends('layouts.app')

@section('content')

    <!-- About Us Section -->
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="text-dark">{{ __('pages.about_title') }}</h2>
                <p class="text-dark">
                    {{ __('pages.about_description') }}
                </p>
                <h2 class="text-dark">{{ __('pages.mission_title') }}</h2>
                <p class="text-dark">
                    {{ __('pages.mission_description') }}
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('storage/default/default.jpg') }}" alt="{{ __('pages.about_image_alt') }}" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <!-- Our Values Section -->
    <div class="container py-5">
        <h2 class="text-center text-dark mb-4">{{ __('pages.values_title') }}</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <i class="fas fa-users fa-3x icon-primary"></i>
                <h4 class="text-dark mt-3">{{ __('pages.value_community') }}</h4>
                <p class="text-dark">{{ __('pages.value_community_description') }}</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fas fa-lock fa-3x icon-primary"></i>
                <h4 class="text-dark mt-3">{{ __('pages.value_security') }}</h4>
                <p class="text-dark">{{ __('pages.value_security_description') }}</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fas fa-star fa-3x icon-primary"></i>
                <h4 class="text-dark mt-3">{{ __('pages.value_excellence') }}</h4>
                <p class="text-dark">{{ __('pages.value_excellence_description') }}</p>
            </div>
        </div>
    </div>

@endsection
