@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-primary to-accent py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ __('pages.about_us') }}</h1>
                <p class="lead mb-0">{{ __('pages.about_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="bg-light">
    <div class="container">        
        <div class="row g-5 mx-2">
            <div class=" card-custom py-2">
                <div class="ps-lg-5">
                    <div class="section-title mb-4">
                        <h2 class="h1 mb-4">{{ __('pages.about_title') }}</h2>
                    </div>
                    
                    <p class="lead mb-4">{{ __('pages.about_lead') }}</p>
                    
                    <p class="mb-4">{{ __('pages.about_description') }}</p>
                    
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon">
                                    <i class="fas fa-check text-primary"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="mb-0">{{ __('pages.trusted_platform') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon">
                                    <i class="fas fa-check text-primary"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="mb-0">{{ __('pages.professional_staff') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon">
                                    <i class="fas fa-check text-primary"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="mb-0">{{ __('pages.fair_prices') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon">
                                    <i class="fas fa-check text-primary"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="mb-0">{{ __('pages.best_service') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <a href="{{ route('contact') }}" class="btn-custom btn-primary">
                            <i class="fas fa-envelope me-2"></i> {{ __('pages.contact_us') }}
                        </a>
                    </div>
                  
                </div>
            </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="card-custom h-100">
                    <div class="card-body p-5">
                        <div class="section-title mb-4">
                            <div class="mission-icon mb-3">
                                <i class="fas fa-bullseye text-primary"></i>
                            </div>
                            <h3>{{ __('pages.our_mission') }}</h3>
                        </div>
                        
                        <p class="mb-0">{{ __('pages.mission_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-custom h-100">
                    <div class="card-body p-5">
                        <div class="section-title mb-4">
                            <div class="vision-icon mb-3">
                                <i class="fas fa-eye text-primary"></i>
                            </div>
                            <h3>{{ __('pages.our_vision') }}</h3>
                        </div>
                        
                        <p class="mb-0">{{ __('pages.vision_description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-2 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h6 class="text-primary text-uppercase fw-bold mb-2">{{ __('pages.our_values') }}</h6>
                    <h2 class="h1 mb-4">{{ __('pages.values_title') }}</h2>
                    <p class="lead">{{ __('pages.values_subtitle') }}</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card-custom h-100 text-center">
                    <div class="card-body p-5">
                        <div class="value-icon mb-3">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">{{ __('pages.value_community') }}</h4>
                        <p class="mb-0">{{ __('pages.value_community_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-custom h-100 text-center">
                    <div class="card-body p-5">
                        <div class="value-icon mb-3">
                            <i class="fas fa-lock fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">{{ __('pages.value_security') }}</h4>
                        <p class="mb-0">{{ __('pages.value_security_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-custom h-100 text-center">
                    <div class="card-body p-5">
                        <div class="value-icon mb-3">
                            <i class="fas fa-star fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">{{ __('pages.value_excellence') }}</h4>
                        <p class="mb-0">{{ __('pages.value_excellence_description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Team Section -->
<section class="py-3">
    <div class="container py-4">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h6 class="text-primary text-uppercase fw-bold mb-2">{{ __('pages.our_team') }}</h6>
                    <h2 class="h1 mb-4">{{ __('pages.meet_our_team') }}</h2>
                    <p class="lead">{{ __('pages.team_subtitle') }}</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @php
                $team = [
                    ['name' => 'Nayir Alzubedy', 'role' => __('pages.ceo_founder'), 'img' => 'profile.png'],
                    ['name' => 'Mohammed Al Sheikh', 'role' => __('pages.marketing_director'), 'img' => 'profile.png'],
                    ['name' => 'Abdullaziz alsolami', 'role' => __('pages.tech_lead'), 'img' => 'profile.png'],
                    ['name' => 'Ahmad Alqurashi', 'role' => __('pages.customer_relations'), 'img' => 'profile.png'],
                    ['name' => 'Khalid Al-Harbi', 'role' => __('pages.customer_relations'), 'img' => 'profile.png'],

                ];
            @endphp

            @foreach($team as $member)
                <div class="col-lg-3 col-md-4">
                    <div class="card-custom h-100 text-center">
                        <div class="card-body d-flex flex-column p-4 align-items-center">
                            <img src="{{ asset('Assets/default/' . $member['img']) }}" alt="{{ $member['name'] }}" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                            <h5 class="mb-1">{{ $member['name'] }}</h5>
                            <p class="text-muted">{{ $member['role'] }}</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#"><i class="fab fa-facebook-f text-primary"></i></a>
                                <a href="#"><i class="fab fa-twitter text-primary"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in text-primary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Stats Section -->
<section class="py-5 bg-gradient-to-r from-primary to-accent text-white">
    <div class="container py-4">
        <div class="row g-4">
            @foreach([
                ['number' => '500+', 'label' => __('pages.events_hosted')],
                ['number' => '50k+', 'label' => __('pages.happy_customers')],
                ['number' => '100+', 'label' => __('pages.event_organizers')],
                ['number' => '15+', 'label' => __('pages.cities_covered')],
            ] as $stat)
                <div class="col-lg-3 col-md-6">
                    <div class="card-custom h-100 text-center bg-transparent border-0">
                        <div class="card-body p-4">
                            <div class="stat-number display-5 fw-bold text-primary">{{ $stat['number'] }}</div>
                            <div class="stat-text text-dark">{{ $stat['label'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
