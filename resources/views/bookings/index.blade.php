@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-primary to-accent  py-5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ __('pages.my_bookings') }}</h1>
                <p class="lead mb-0">{{ __('pages.bookings_description') }}</p>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
    @if($bookings->isEmpty())
        <div class="row">
            <div class="col-md-8 mx-auto text-center py-5">
                <div class="card-custom shadow-sm border-0 p-5">
                    <div class="py-4">
                        <i class="fas fa-ticket-alt fa-4x text-muted mb-4"></i>
                        <h3 class="fw-bold mb-3">{{ __('pages.no_bookings_yet') }}</h3>
                        <p class="text-muted mb-4">{{ __('pages.no_bookings_message') }}</p>
                        <a href="{{ route('events.index') }}" class="btn btn-primary px-4 py-2">
                            <i class="fas fa-search me-2"></i>{{ __('pages.browse_events') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            @foreach ($bookings as $booking)
                <div class="col-lg-6 mb-4">
                    <div class="card-custom h-100 shadow-sm border-0 overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ asset('Assets/' . ($booking->event->images->first() ? $booking->event->images->first()->path : 'default/default.jpg')) }}"
                                 alt="{{ $booking->event->name }}"
                                 class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 p-3">
                                <span class="badge {{ $booking->status == 'pending' ? 'bg-warning' : 'bg-success' }} px-3 py-2 rounded-pill">
                                    {{ $booking->status == 'pending' ? __('pages.status_pending') : __('pages.status_confirmed') }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title fw-bold mb-0">{{ $booking->event->name }}</h4>
                                <a href="{{ route('bookings.show', ['id' => $booking->id]) }}" class="btn btn-sm btn-outline-primary rounded-circle" title="{{ __('pages.view_tickets') }}">
                                    <i class="fas fa-ticket-alt"></i>
                                </a>
                            </div>

                            <div class="mb-3">
                                <span class="badge bg-light text-dark me-2 mb-2">
                                    <i class="fas fa-tag me-1 text-primary"></i> {{ $booking->event->category->name }}
                                </span>
                                <span class="badge bg-light text-dark me-2 mb-2">
                                    <i class="fas fa-ticket-alt me-1 text-primary"></i> {{ $booking->tickets_count }} {{ __('pages.tickets') }}
                                </span>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-light rounded-circle p-2 me-2">
                                            <i class="fas fa-calendar-alt text-primary"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">{{ __('pages.start_date') }}</small>
                                            <span>{{ \Carbon\Carbon::parse($booking->event->start_date)->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-light rounded-circle p-2 me-2">
                                            <i class="fas fa-calendar-check text-primary"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">{{ __('pages.end_date') }}</small>
                                            <span>{{ \Carbon\Carbon::parse($booking->event->end_date)->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-light rounded-circle p-2 me-2">
                                            <i class="fas fa-map-marker-alt text-primary"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">{{ __('pages.location') }}</small>
                                            <span>{{ $booking->event->city->name }}, {{ $booking->event->country->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted d-block">{{ __('pages.booking_date') }}</small>
                                    <span><i class="far fa-calendar me-1"></i>{{ $booking->created_at->format('M d, Y') }}</span>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block">{{ __('pages.total_price') }}</small>
                                    <span class="fw-bold text-primary">{{ $booking->payment_details['amount'] }} {{ __('pages.currency') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-0 p-4 pt-0">
                            <a href="{{ route('bookings.show', ['id' => $booking->id]) }}" class="btn btn-primary w-100">
                                <i class="fas fa-eye me-2"></i>{{ __('pages.view_tickets') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
