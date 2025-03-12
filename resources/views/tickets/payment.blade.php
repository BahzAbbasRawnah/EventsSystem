@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row">
        <!-- Order Summary -->
        <div class="card col-md-6">
            <h2 class=" fw-bold mb-4">{{ __('pages.summary') }}</h2>

            <!-- Category -->
            <p class="">
                <i class="fas fa-tag text-primary mx-2"></i>
                <strong>{{ __('pages.category') }}</strong> {{ $event->category->name }}
            </p>

            <!-- Event Name -->
            <p class="">
                <i class="fas fa-calendar-check text-primary mx-2"></i>
                <strong>{{ __('pages.event_name') }}</strong> {{ $event->name }}
            </p>

            <!-- Date -->
            <p class="">
                <i class="fas fa-calendar-alt text-primary mx-2"></i>
                <strong>{{ __('pages.date') }}</strong> 
                {{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }} 
                - {{ \Carbon\Carbon::parse($event->end_date)->format('M d, Y') }}
            </p>

            <!-- Time -->
            <p class="">
                <i class="fas fa-clock text-primary mx-2"></i>
                <strong>{{ __('pages.time') }}</strong> 
                {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} 
                - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
            </p>

            <!-- Location -->
            <p class="">
                <i class="fas fa-map-marker-alt text-primary mx-2"></i>
                <strong>{{ __('pages.location') }}</strong> 
                {{ $event->country->name }} - {{ $event->city->name }} - {{ $event->district->name }}
            </p>

            <!-- Quantity -->
            <p class="">
                <i class="fas fa-ticket-alt text-primary mx-2"></i>
                <strong>{{ __('pages.tickets_count') }}</strong> {{ $booking['quantity'] }}
            </p>

            <!-- Price -->
            <p class="">
                <i class="fas fa-dollar-sign text-primary mx-2"></i>
                <strong>{{ __('pages.ticket_price') }}</strong> ${{ number_format($event->ticket_price, 2) }}
            </p>

            <!-- Total -->
            <p class=" fw-bold">
                <i class="fas fa-calculator text-primary mx-2"></i>
                <strong>{{ __('pages.total') }}</strong> ${{ number_format($event->ticket_price * $booking['quantity'], 2) }}
            </p>
        </div>

        <!-- Payment Details -->
        <div class="col-md-6 card">
            <h2 class=" fw-bold mb-4">{{ __('pages.details') }}</h2>
            
            <form method="POST" action="{{ route('tickets.payment') }}">
                @csrf

                <!-- Hidden fields to send booking details -->
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <input type="hidden" name="quantity" value="{{ $booking['quantity'] }}">
                <input type="hidden" name="total_price" value="{{ $event->ticket_price * $booking['quantity'] }}">
                <input type="hidden" name="guest_name" value="{{$booking['guest_name'] }}">

                <!-- Cardholder Name -->
                <div class="mb-3">
                    <label for="card-name" class="form-label ">{{ __('pages.cardholder_name') }}</label>
                    <input type="text" name="card_name" class="form-control" id="card-name" placeholder="{{ __('pages.enter_card_name') }}" required>
                </div>

                <!-- Payment Method -->
                <div class="mb-3">
                    <label class="form-label ">{{ __('pages.method') }}</label>
                    <div class="row g-2">
                        @foreach ($payment_methods as $method)
                            <div class="col-6 col-md-4">
                                <div class="form-check d-flex flex-row justify-content-between align-items-center">
                                    <input class="form-check-input border-primary text-white mx-2" type="radio" name="payment_method_id" value="{{ $method->id }}">
                                    <label class="form-check-label align-items-center">
                                        <img src="{{ asset('storage/' . $method->image) }}" 
                                            alt="{{ $method->name }}" class="img-fluid" style="max-width: 60px; height: auto;">
                                        <span class="ms-2">{{ $method->name }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Card Number -->
                <div class="mb-3">
                    <label for="card-number" class="form-label ">{{ __('pages.card_number') }}</label>
                    <input type="text" name="card_number" class="form-control" id="card-number" placeholder="{{ __('pages.card_placeholder') }}" required>
                </div>

                <div class="row">
                    <!-- Expiry Date -->
                    <div class="col-md-6 mb-3">
                        <label for="expiry-date" class="form-label ">{{ __('pages.expiry_date') }}</label>
                        <input type="text" name="expiry_date" class="form-control" id="expiry-date" placeholder="{{ __('pages.expiry_placeholder') }}" required>
                    </div>

                    <!-- CVV -->
                    <div class="col-md-6 mb-3">
                        <label for="cvv" class="form-label ">{{ __('pages.cvv') }}</label>
                        <input type="text" name="cvv" class="form-control" id="cvv" placeholder="{{ __('pages.cvv_placeholder') }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">{{ __('pages.complete') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
