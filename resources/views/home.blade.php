@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Find and Book Your Next Event</h1>
    <p>Discover amazing events and grab your tickets today!</p>
</div>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <a href="#featured-events" class="btn btn-primary btn-lg">Explore Events</a>
    </div>
</section>

<!-- Featured Events Section -->
{{-- <section id="featured-events" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Featured Events</h2>
        <div class="row">
            @foreach($featuredEvents as $event)
            <div class="col-md-4 mb-4">
                <div class="card event-card h-100">
                    <img src="{{ $event->image_url }}" class="card-img-top" alt="{{ $event->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">
                            <i class="fas fa-calendar-alt"></i> {{ $event->date->format('M d, Y') }}<br>
                            <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="/events/{{ $event->id }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="/events" class="btn btn-outline-primary">View All Events</a>
        </div>
    </div>
</section> --}}

<!-- Categories Section -->
{{-- <section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Browse By Category</h2>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-6 col-md-3 mb-4">
                <a href="/events?category={{ $category->slug }}" class="category-card">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="{{ $category->icon }} fa-2x mb-3"></i>
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="text-muted">{{ $category->event_count }} events</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}

<!-- Upcoming Events Section -->
{{-- <section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Upcoming Events</h2>
        <div class="row">
            @foreach($upcomingEvents as $event)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $event->image_url }}" class="img-fluid rounded-start" alt="{{ $event->name }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->name }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt"></i> {{ $event->date->format('M d, Y') }}<br>
                                        <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
                                    </small>
                                </p>
                                <a href="/events/{{ $event->id }}" class="btn btn-sm btn-outline-primary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}

<!-- Testimonials Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">What Our Attendees Say</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Ahmed Saleh</h5>
                        <div class="text-warning mb-2">
                            <i class="fas fa-star text-warning" ></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="card-text">"The concert was amazing! Easy booking process and great seats."</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Mohammed Ali</h5>
                        <div class="text-warning mb-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="card-text">"The booking system was incredibly smooth! Got my festival tickets in minutes and enjoyed every moment."</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Fatima Rahman</h5>
                        <div class="text-warning mb-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="card-text">"Excellent customer service when I needed to change my reservation. The theater event was spectacular!"</p>
                    </div>
                </div>
            </div>
        
            <!-- Add more testimonials -->
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h3 class="text-white">Stay Updated</h3>
                <p class="text-white">Subscribe to our newsletter for the latest events and offers</p>
            </div>
      
        </div>
    </div>
</section>

@endsection