@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-primary to-accent  py-5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ __('pages.your_tickets') }}</h1>
                <p class="lead mb-0">{{ __('pages.tickets_description') }}</p>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
    @if(!$booking)
        <div class="row">
            <div class="col-md-8 mx-auto text-center py-5">
                <div class="card-custom shadow-sm border-0 p-5">
                    <div class="py-4">
                        <i class="fas fa-ticket-alt fa-4x text-muted mb-4"></i>
                        <h3 class="fw-bold mb-3">{{ __('pages.no_bookings_found') }}</h3>
                        <p class="text-muted mb-4">{{ __('pages.booking_not_found_message') }}</p>
                        <a href="{{ route('bookings') }}" class="btn btn-primary px-4 py-2">
                            <i class="fas fa-arrow-left me-2"></i>{{ __('pages.back_to_bookings') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Event Details -->
        <div class="card-custom shadow-sm border-0 overflow-hidden mb-5">
            <div class="row g-0">
                <div class="col-lg-5 position-relative">
                    <img src="{{ asset($booking->event->images->isNotEmpty() ? 'Assets/' . $booking->event->images->first()->path : 'Assets/default/default.jpg') }}"
                         alt="{{ $booking->event->name }}"
                         class="w-100 h-100" style="object-fit: cover;">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                        <h3 class="text-white fw-bold mb-2">{{ $booking->event->name }}</h3>
                        <div class="d-flex align-items-center text-white">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span> {{ $booking->event->country->name }},{{ $booking->event->city->name }},,{{ $booking->event->district->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="p-4 p-lg-5">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="fw-bold mb-0">{{ __('pages.booking_details') }}</h4>
                            <span class="badge {{ $booking->status == 'pending' ? 'bg-warning' : 'bg-success' }} px-3 py-2 rounded-pill">
                                {{ $booking->status == 'pending' ? __('pages.status_pending') : __('pages.status_confirmed') }}
                            </span>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box bg-light rounded-circle p-3 me-3">
                                        <i class="fas fa-calendar-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">{{ __('pages.event_date') }}</small>
                                        <span class="fw-semibold">{{ \Carbon\Carbon::parse($booking->event->start_date)->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box bg-light rounded-circle p-3 me-3">
                                        <i class="fas fa-clock text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">{{ __('pages.event_time') }}</small>
                                        <span class="fw-semibold">{{ \Carbon\Carbon::parse($booking->event->start_date)->format('h:i A') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box bg-light rounded-circle p-3 me-3">
                                        <i class="fas fa-ticket-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">{{ __('pages.tickets_count') }}</small>
                                        <span class="fw-semibold">{{ $booking->tickets_count }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box bg-light rounded-circle p-3 me-3">
                                        <i class="fas fa-dollar-sign text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">{{ __('pages.total_price') }}</small>
                                        <span class="fw-semibold">{{ $booking->payment_details['amount'] }} {{ __('pages.currency') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <small class="text-muted d-block">{{ __('pages.booking_date') }}</small>
                                <span><i class="far fa-calendar me-1"></i>{{ $booking->created_at->format('M d, Y') }}</span>
                            </div>
                            <div>
                                <a href="#" class="btn btn-outline-primary" id="printAllTickets">
                                    <i class="fas fa-print me-2"></i>{{ __('pages.print_all_tickets') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tickets -->
        <h4 class="fw-bold mb-4">{{ __('pages.your_tickets') }} ({{ $booking->tickets_count }})</h4>
        <div class="row">
            @for ($ticket=0; $ticket < $booking->tickets_count; $ticket++)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card-custom ticket-card h-100 shadow-sm border-0 overflow-hidden" id="ticketContent{{ $ticket }}">
                        <div class="position-relative">
                            <img src="{{ asset($booking->event->images->isNotEmpty() ? 'Assets/' . $booking->event->images->first()->path : 'Assets/default/default.jpg') }}"
                                 alt="{{ $booking->event->name }}"
                                 class="card-img-top" style="height: 150px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                                <div class="bg-white bg-opacity-75 px-4 py-2 rounded-pill">
                                    <span class="fw-bold text-primary">{{ __('pages.ticket') }} #{{ $ticket + 1 }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-3">{{ $booking->event->name }}</h5>

                            <div class="ticket-details mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-calendar-alt text-primary me-2"></i>
                                    <span>{{ \Carbon\Carbon::parse($booking->event->start_date)->format('M d, Y - h:i A') }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <span>{{ $booking->event->country->name }} ,{{ $booking->event->city->name }} ,{{ $booking->event->district->name }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-user text-primary me-2"></i>
                                    <span>{{ $booking->guest_name ?: auth()->user()->name }}</span>
                                </div>
                            </div>

                            <div class="ticket-code p-3 bg-light rounded text-center mb-3">
                                <span class="d-block fw-bold mb-1">{{ __('pages.ticket_code') }}</span>
                                <span class="ticket-number fw-bold text-primary">{{ Str::random(10) }}</span>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-0 p-4 pt-0">
                            <button class="btn btn-outline-primary w-100 print-ticket" data-ticket="{{ $ticket }}">
                                <i class="fas fa-print me-2"></i>{{ __('pages.print_ticket') }}
                            </button>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    @endif
</div>

@section('scripts')
<script>
    $(document).ready(function () {
        // Print individual ticket
        $('.print-ticket').click(function() {
            const ticketNum = $(this).data('ticket');
            const element = document.getElementById('ticketContent' + ticketNum);
            const opt = {
                margin: 10,
                filename: 'ticket_' + ticketNum + '.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(element).save();
        });

        // Print all tickets
        $('#printAllTickets').click(function(e) {
            e.preventDefault();
            const ticketsCount = {{ $booking->tickets_count }};

            for(let i = 0; i < ticketsCount; i++) {
                setTimeout(function() {
                    const element = document.getElementById('ticketContent' + i);
                    const opt = {
                        margin: 10,
                        filename: 'ticket_' + i + '.pdf',
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 2 },
                        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                    };

                    html2pdf().set(opt).from(element).save();
                }, i * 1000); // Delay each print by 1 second to avoid browser issues
            }
        });
    });
</script>
@endsection

@endsection