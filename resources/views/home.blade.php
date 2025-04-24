@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-content min-vh-50">
                <h1 class="hero-title">{{ __('pages.hero_title') }}</h1>
                <p class="hero-subtitle">{{ __('pages.hero_subtitle') }}</p>
                <div class="d-flex flex-wrap gap-3  ">
                    <a href="{{ route('events.index') }}" class="btn-custom bg-white " >{{ __('pages.explore_events') }}</a>
                    <a href="{{ route('about') }}" class="btn-custom btn-outline-primary text-white">{{ __('pages.learn_more') }}</a>
                </div>
            </div>
          
        </div>
    </div>

    <!-- Decorative shapes -->
    <div class="hero-shape shape-1"></div>
    <div class="hero-shape shape-2"></div>
</section>

<!-- Categories Section -->
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title text-center">{{ __('pages.browse_by_category') }}</h2>
        <p class="section-subtitle text-center">{{ __('pages.category_subtitle') }}</p>

        <div class="row g-4 justify-content-center">
            @foreach($categories as $category)
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('events.index', ['category' => $category->id]) }}" class="text-decoration-none">
                    <div class="card-custom text-center p-4 h-100">
                        <div class="rounded-circle bg-primary-light p-3 d-inline-flex mx-auto mb-3" style="width: 70px; height: 70px;">
                            <i class="fas fa-{{ $category->icon ?? 'star' }} fa-2x m-auto text-primary"></i>
                        </div>
                        <h5 class="mb-0">{{ $category->name }}</h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Events Section -->
<section class="section-padding">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="section-title mb-1">{{ __('pages.featured_events') }}</h2>
                <p class="section-subtitle mb-0">{{ __('pages.featured_subtitle') }}</p>
            </div>
            <a href="{{ route('events.index') }}" class="btn-custom btn-outline-primary">{{ __('pages.view_all') }}</a>
        </div>

        <div class="row g-4">
            @foreach($events as $event)
            <div class="col-md-6 col-lg-4">
                <div class="card-custom event-card">
                    <div class="position-relative">
                        <img src="{{ asset('Assets/' . ($event->images->first()->path ?? 'default/default.jpg')) }}"
                             class="card-img-top" alt="{{ $event->name }}" >
                        <span class="event-badge">{{ $event->ticket_price }} {{ __('pages.currency') }}</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ $event->name }}</h5>

                        <div class="event-info">
                            <i class="fas fa-calendar-alt"></i>
                            <span>{{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }}</span>
                        </div>

                        <div class="event-info">
                            <i class="fas fa-clock"></i>
                            <span>{{ \Carbon\Carbon::parse($event->start_date)->format('h:i A') }}</span>
                        </div>

                        <div class="event-info">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $event->city->name }}, {{ $event->country->name }}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('events.show', $event->id) }}" class="btn-custom btn-primary w-100">{{ __('pages.view_details') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>





<!-- How It Works Section -->
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title text-center">{{ __('pages.how_it_works') }}</h2>
        <p class="section-subtitle text-center">{{ __('pages.how_it_works_subtitle') }}</p>

        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card-custom text-center p-4 h-100">
                    <div class="rounded-circle bg-primary-light p-3 d-inline-flex mx-auto mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-search fa-2x m-auto text-primary"></i>
                    </div>
                    <h4 class="mb-3">{{ __('pages.find_events') }}</h4>
                    <p class="text-gray mb-0">{{ __('pages.find_events_desc') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom text-center p-4 h-100">
                    <div class="rounded-circle bg-primary-light p-3 d-inline-flex mx-auto mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-ticket-alt fa-2x m-auto text-primary"></i>
                    </div>
                    <h4 class="mb-3">{{ __('pages.book_tickets') }}</h4>
                    <p class="text-gray mb-0">{{ __('pages.book_tickets_desc') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom text-center p-4 h-100">
                    <div class="rounded-circle bg-primary-light p-3 d-inline-flex mx-auto mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-smile fa-2x m-auto text-primary"></i>
                    </div>
                    <h4 class="mb-3">{{ __('pages.enjoy') }}</h4>
                    <p class="text-gray mb-0">{{ __('pages.enjoy_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section-padding">
    <div class="container">
        <h2 class="section-title text-center">{{ __('pages.testimonials_title') }}</h2>
        <p class="section-subtitle text-center">{{ __('pages.testimonials_subtitle') }}</p>

        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card-custom p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-primary-light d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <span class="fw-bold text-primary">AS</span>
                        </div>
                        <div>
                            <h5 class="mb-0">{{ __('pages.testimonial1_name') }}</h5>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="fst-italic text-gray mb-0">"{{ __('pages.testimonial1_text') }}"</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-primary-light d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <span class="fw-bold text-primary">MA</span>
                        </div>
                        <div>
                            <h5 class="mb-0">{{ __('pages.testimonial2_name') }}</h5>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="fst-italic text-gray mb-0">"{{ __('pages.testimonial2_text') }}"</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-primary-light d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <span class="fw-bold text-primary">FR</span>
                        </div>
                        <div>
                            <h5 class="mb-0">{{ __('pages.testimonial3_name') }}</h5>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="fst-italic text-gray mb-0">"{{ __('pages.testimonial3_text') }}"</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="section-padding bg-gradient-to-r from-primary to-accent ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="section-title mb-3">{{ __('pages.newsletter_title') }}</h2>
                <p class="mb-4 opacity-90">{{ __('pages.newsletter_subtitle') }}</p>

                <form class="row g-2 justify-content-center">
                    <div class="col-md-8">
                        <input type="email" class="form-control form-control-custom" placeholder="{{ __('pages.email_placeholder') }}">
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn-custom w-100" style="background-color: white; color: var(--primary);">{{ __('pages.subscribe') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection