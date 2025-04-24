@extends('layouts.app')

@section('content')
<!-- Event Hero Section -->
<section class="position-relative mb-5">
    <div class="event-hero-image" style="background-image: url('{{ asset('Assets/' . ($event->images->first()->path ?? 'default/default.jpg')) }}');">
        <div class="event-hero-overlay"></div>
    </div>
    <div class="container position-relative" style="margin-top: -100px; z-index: 10;">
        <div class="row">
            <div class="col-lg-8">
                <div class="card-custom p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h1 class="mb-3">{{ $event->name }}</h1>
                            <div class="d-flex flex-wrap gap-3 my-2">
                                <span class="badge bg-primary-light text-primary py-2 px-3">
                                    <i class="fas fa-tag me-1"></i> {{ $event->category->name }}
                                </span>
                                <span class="badge bg-success py-2 px-3 text-white">
                                    <i class="fas fa-dollar-sign me-1"></i> {{ $event->ticket_price }} {{ __('pages.currency') }}
                                </span>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="d-flex gap-2">
                                <button class="btn-custom btn-outline-primary btn-sm" onclick="shareEvent()">
                                    <i class="fas fa-share-alt me-1"></i> {{ __('pages.share') }}
                                </button>
                                <button class="btn-custom btn-outline-primary btn-sm" onclick="saveEvent({{ $event->id }})">
                                    <i class="far fa-bookmark me-1"></i> {{ __('pages.save') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Event Details -->
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="card-custom p-3 h-100">
                                <h5 class="mb-3">
                                    <i class="fas fa-calendar-alt text-primary me-2"></i> {{ __('pages.date_and_time') }}
                                </h5>
                                <div class="mb-2">
                                    <div class="text-gray small">{{ __('pages.start_date') }}</div>
                                    <div class="fw-medium">{{ \Carbon\Carbon::parse($event->start_date)->format('l, F d, Y') }}</div>
                                </div>
                                <div class="mb-2">
                                    <div class="text-gray small">{{ __('pages.start_time') }}</div>
                                    <div class="fw-medium">{{ \Carbon\Carbon::parse($event->start_date)->format('h:i A') }}</div>
                                </div>
                                <div class="mb-2">
                                    <div class="text-gray small">{{ __('pages.end_date') }}</div>
                                    <div class="fw-medium">{{ \Carbon\Carbon::parse($event->end_date)->format('l, F d, Y') }}</div>
                                </div>
                                <div>
                                    <div class="text-gray small">{{ __('pages.end_time') }}</div>
                                    <div class="fw-medium">{{ \Carbon\Carbon::parse($event->end_date)->format('h:i A') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-custom p-3 h-100">
                                <h5 class="mb-3">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i> {{ __('pages.location') }}
                                </h5>
                                <div class="mb-2">
                                    <div class="text-gray small">{{ __('pages.country') }}</div>
                                    <div class="fw-medium">{{ $event->country->name }}</div>
                                </div>
                                <div class="mb-2">
                                    <div class="text-gray small">{{ __('pages.city') }}</div>
                                    <div class="fw-medium">{{ $event->city->name }}</div>
                                </div>
                                <div>
                                    <div class="text-gray small">{{ __('pages.district') }}</div>
                                    <div class="fw-medium">{{ $event->district->name }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Description -->
                    <div class="mb-4">
                        <h4 class="mb-3">{{ __('pages.description') }}</h4>
                        <div class="card-custom p-3">
                            <p class="mb-0">{{ $event->description }}</p>
                        </div>
                    </div>

                    <!-- Event Gallery -->
                    <div>
                        <h4 class="mb-3">{{ __('pages.event_gallery') }}</h4>
                        <div class="row g-3">
                            @foreach($event->images as $image)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <a href="{{ asset('Assets/' . ($image->path ?? 'default/default.jpg')) }}" data-lightbox="event-gallery">
                                        <img src="{{ asset('Assets/' . ($image->path ?? 'default/default.jpg')) }}" 
                                             class="img-fluid rounded-custom shadow-sm" 
                                             alt="{{ __('pages.event_gallery') }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Ticket Information -->
                <div class="card-custom p-4 mb-4">
                    <h4 class="mb-3">{{ __('pages.ticket_information') }}</h4>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>{{ __('pages.price') }}</span>
                        <span class="fw-bold fs-5">{{ $event->ticket_price }} {{ __('pages.currency') }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>{{ __('pages.available_tickets') }}</span>
                        <span class="fw-bold">{{ $event->tickets_quantity }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span>{{ __('pages.status') }}</span>
                        <span class="badge {{ $event->tickets_quantity > 0 ? 'bg-success' : 'bg-danger' }} py-2 px-3">
                            {{ $event->tickets_quantity > 0 ? __('pages.available') : __('pages.sold_out') }}
                        </span>
                    </div>
                    @if ($event->tickets_quantity > 0)
                    <a href="{{ route('tickets.buy', $event->id) }}" class="btn-custom btn-primary w-100 py-3">
                        {{ __('pages.buy_tickets') }}
                    </a>
                   @endif
                
                
                  
                </div>

                <!-- Organizer Information -->
                <div class="card-custom p-4 mb-4">
                    <h4 class="mb-3">{{ __('pages.organizer') }}</h4>
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-primary-light d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">{{ $event->user->name }}</h5>
                            <p class="text-gray mb-0 small">{{ __('pages.event_organizer') }}</p>
                        </div>
                    </div>
                    <p class="mb-3">{{ __('pages.contact_orgnizer_description') }}</p>
                    <a href="mailto:{{ $event->user->email }}" class="btn-custom btn-outline-primary w-100">
                        <i class="fas fa-envelope me-2"></i> {{ __('pages.contact_organizer') }}
                    </a>
                </div>

                <!-- Similar Events -->
                <div class="card-custom p-4">
                    <h4 class="mb-3">{{ __('pages.similar_events') }}</h4>
                    @foreach($similarEvents as $similarEvent)
                        <div class="d-flex mb-3">
                            <img src="{{ asset('Assets/' . ($similarEvent->images->first()->path ?? 'default/default.jpg')) }}" 
                                 class="rounded-custom me-3" 
                                 alt="{{ $similarEvent->name }}"
                                 style="width: 80px; height: 60px; object-fit: cover;">
                            <div>
                                <h6 class="mb-1">{{ $similarEvent->name }}</h6>
                                <div class="d-flex align-items-center text-gray small">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    <span>{{ \Carbon\Carbon::parse($similarEvent->start_date)->format('M d, Y') }}</span>
                                </div>
                                <a href="{{ route('events.show', $similarEvent->id) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Back to Events -->
<div class="container mb-5">
    <a href="{{ route('events.index') }}" class="text-decoration-none">
        <i class="fas fa-arrow-left me-2"></i> {{ __('pages.back_to_events') }}
    </a>
</div>

<style>
    .event-hero-image {
        height: 500px;
        background-size: cover;
        background-position: center;
        position: relative;
    }
    
    .event-hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.8) 100%);
    }
</style>

<script>
    function shareEvent() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $event->name }}',
                text: '{{ $event->description }}',
                url: window.location.href,
            })
            .then(() => console.log('Successful share'))
            .catch((error) => console.log('Error sharing', error));
        } else {
            alert('{{ __("pages.share_not_supported") }}');
        }
    }
    
    function saveEvent(eventId) {
        // This would typically be an AJAX call to save the event to the user's favorites
        alert('{{ __("pages.event_saved") }}');
    }
</script>
@endsection
