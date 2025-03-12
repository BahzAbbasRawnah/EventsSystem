@extends('layouts.app')

@section('content')
<div class="container">

    @if($bookings->isEmpty())
    <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
        <div class="alert alert-info text-center" role="alert">
            {{ __('pages.no_bookings') }}
        </div>
        <img src="{{ asset('storage/default/empty.png') }}" alt="{{ __('pages.event_image') }}" class="empty-image rounded mb-3">
    </div>
@else
   
<h2 class="text-center mb-4">{{ __('pages.bookings_list') }}</h2>
<div class="row">

        @foreach ($bookings as $booking)
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-center text-white mb-0">{{ $booking->event->name }}</h3>
                    <a href="{{ route('bookings.show', ['id' => $booking->id]) }}"  title="Print">
                        <i class="fas fa-print text-white"></i>
                    </a>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img src="{{ asset($booking->event->images_list->first() ? 'storage/' . $booking->event->images_list->first() : 'storage/default/default.jpg') }}" alt="{{ __('pages.event_image') }}" class="img-fluid rounded mb-3">
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><i class="fas fa-hashtag text-primary mx-2"></i> {{ $booking->event->category->name }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><i class="fas fa-calendar text-primary mx-2"></i> {{ $booking->event->start_date }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><i class="fas fa-calendar text-primary mx-2"></i> {{ $booking->event->end_date }}</p>
                                </div>
                                <div class="col-12">
                                    <p><i class="fas fa-map-marker-alt text-primary mx-2"></i> {{ $booking->event->country->name }} / {{ $booking->event->city->name }} / {{ $booking->event->district->name }}</p>
                                </div>

                                <hr>
                              
                                <div class="col-6">
                                    <p><i class="fas fa-hashtag text-primary mx-2"></i> 
                                        {{ $booking->status == 'pending' ? __('pages.status_pending') : __('pages.status_confirmed') }}
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p><i class="fas fa-calendar text-primary mx-2"></i>{{ $booking->created_at->format('M d, Y') }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><i class="fas fa-ticket-alt text-primary mx-2"></i>{{ __('pages.tickets_count') }}: {{ $booking->tickets_count }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><i class="fas fa-dollar-sign text-primary mx-2"></i>{{ __('pages.ticket_price') }}: {{ $booking->ticket_price }} {{ __('pages.currency') }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><i class="fas fa-dollar-sign text-primary mx-2"></i>{{ __('pages.total_price') }}: {{ $booking->payment_details['amount'] }} {{ __('pages.currency') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(count( $booking->event->images_list)>0)
                <div class="card-footer bg-light">
                    <div class="d-flex justify-content-center">
                        @foreach ($booking->event->images_list as $image)
                        <img src="{{ asset('storage/'.$image) }}" alt="{{ __('pages.event_image') }}" class="img-thumbnail m-2" style="max-width: 100px;">
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

        @endif
</div>
@endsection
