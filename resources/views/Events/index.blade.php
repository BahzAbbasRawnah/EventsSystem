@extends('layouts.app')

@section('content')
<div class="container py-4">
   

    <!-- Categories Section -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex flex-wrap justify-content-md-center">
                @foreach ($categories as $category)
                    <button class="btn btn-outline-primary m-1 text-white">{{ $category->name }}</button>
                @endforeach
            </div>
        </div>
    </div>
    @if($events->isEmpty())
    <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
        <div class="alert alert-info text-center" role="alert">
            {{ __('pages.no_events') }}
        </div>
        <img src="{{ asset('storage/default/empty.png') }}" alt="{{ __('pages.event_image') }}" class="empty-image rounded mb-3">
    </div>
@else
    <!-- Events List -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($events as $event)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . ($event->images->first()->path ?? 'default-image.jpg')) }}" 
                         class="event-image" 
                         alt="Event Image">
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $event->name }}</h5>
                        
                        <!-- Price -->
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-dollar-sign text-primary mx-2"></i>
                            <p class="card-text mb-0"> {{ $event->ticket_price }} {{ __('pages.currency') }}'</p>
                        </div>

                   <!-- Dates -->
<!-- Dates -->
<div class="d-flex align-items-center mb-2">
    <div class="d-flex align-items-center">
        <i class="fas fa-calendar-alt text-primary mx-2"></i>
        <p class="card-text mb-0 mx-2">{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}</p>
    </div>
    <div class="d-flex align-items-center">
        <i class="fas fa-calendar-alt text-primary mx-2"></i>
        <p class="card-text mb-0">{{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d') }}</p>
    </div>
</div>

<!-- Times -->
<div class="d-flex align-items-center mb-2">
    <div class="d-flex align-items-center">
        <i class="fas fa-clock text-primary mx-2"></i>
        <p class="card-text mb-0 mx-2">{{ \Carbon\Carbon::parse($event->start_date)->format('h:i A') }}</p>
    </div>
    <div class="d-flex align-items-center">
        <i class="fas fa-clock text-primary mx-2"></i>
        <p class="card-text mb-0">{{ \Carbon\Carbon::parse($event->end_date)->format('h:i A') }}</p>
    </div>
</div>



                        <!-- Location -->
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt text-primary mx-2"></i>
                            <p class="card-text mb-0">
                                {{ $event->country->name }} - {{ $event->city->name }} - {{ $event->district->name }}
                            </p>
                        </div>

                        <!-- View Details Button -->
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary w-100">{{ __('pages.view_details') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
</div>
@endsection