@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-purple-600 to-indigo-600 py-16 mb-12">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">{{ __('pages.pricing_plans') }}</h1>
                <p class="lead opacity-90 mb-0 px-lg-5">{{ __('pages.choose_plan') }}</p>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
    <!-- Pricing Toggle (if needed) -->
    <div class="text-center mb-5">
        <div class="d-inline-flex align-items-center bg-light rounded-pill p-1">
            <button class="btn btn-sm rounded-pill px-4 py-2 active">{{ __('pages.monthly') }}</button>
            <button class="btn btn-sm rounded-pill px-4 py-2">{{ __('pages.yearly') }}</button>
        </div>
    </div>

    <!-- Pricing Cards -->
    <div class="row g-4 mb-5">
        @foreach ($pricingPackages as $package)
        <div class="col-md-4">
            <div class="pricing-card h-100">
                @if($package->is_popular)
                <div class="popular-badge">{{ __('pages.most_popular') }}</div>
                @endif
                <div class="pricing-header text-center">
                    <h3 class="pricing-title">{{ $package->name }}</h3>
                    <div class="pricing-price">
                        <span class="amount">{{ $package->price }} </span>
                        <p class="currency">{{ __('pages.currency') }}</p>

                    </div>
                </div>
                <div class="pricing-body">
                    <p class="pricing-description text-center mb-4">{{ $package->description }}</p>
                    <ul class="pricing-features">
                        @foreach ($package->features as $feature)
                        <li class="pricing-feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>{{ $feature->name }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="pricing-footer text-center">
                    <a href="{{ route('contact') }}" class="btn-custom {{ $package->is_popular ? 'btn-primary' : 'btn-outline-primary' }} w-100 py-3">
                        {{ __('pages.choose_plan_button') }}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- FAQ Section -->
    <div class="text-center mt-5 pt-4">
        <div class="card-custom p-5 mx-auto" style="max-width: 800px;">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h4 class="fw-bold mb-3">{{ __('pages.have_questions') }}</h4>
                    <p class="text-gray mb-lg-0">{{ __('pages.pricing_contact_text') }}</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <a href="{{ route('contact') }}" class="btn-custom btn-primary px-4 py-2">
                        <i class="fas fa-envelope me-2"></i> {{ __('pages.contact_us') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
