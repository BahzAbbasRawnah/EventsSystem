@extends('layouts.app')

@section('content')
<div class="container">

    @if(!$booking)
    <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
        <div class="alert alert-info text-center" role="alert">
            {{ __('pages.no_bookings') }}
        </div>
        <img src="{{ asset('storage/default/empty.png') }}" alt="{{ __('pages.event_image') }}" class="empty-image rounded mb-3">
    </div>
    @else

    <h2 class="text-center mb-4">{{ __('pages.bookings_list') }}</h2>
    <div class="row">
        @for ($ticket=0; $ticket < $booking->tickets_count ; $ticket++)

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-center mb-0">{{ $booking->event->name }}</h3>
                        {{-- <i class="fas fa-print" id="printButton{{ $ticket }}"></i> --}}
                </div>
                <div class="card-body" id="ticketContent{{ $ticket }}">
                    <div class="row p-0 ">
                        <!-- First Column with Background Image -->
                        <div class="col-12 p-o m-0 text-center" style="background-image: url('{{ asset($booking->event->images_list->first() ? 'storage/' . $booking->event->images_list->first() : 'storage/default/default.jpg') }}'); background-size: cover; background-position: center; min-height: 200px;">
                            <!-- This column will have the background image -->
                        </div>

                        <!-- Rest of the Columns -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><i class="fas fa-calendar text-primary mx-2"></i> {{ $booking->event->start_date }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><i class="fas fa-calendar text-primary mx-2"></i> {{ $booking->event->end_date }}</p>
                                </div>
                                <div class="col-12">
                                    <p><i class="fas fa-map-marker-alt text-primary mx-2"></i> {{ $booking->event->country->name }} / {{ $booking->event->city->name }} / {{ $booking->event->district->name }}</p>
                                </div>

                                <hr>

                                <div class="col-md-6">
                                    <p><i class="fas fa-info-circle text-primary mx-2"></i>{{ Str::random(10) }}</p>
                                </div>

                                <div class="col-md-6">
                                    <p><i class="fas fa-person text-primary mx-2"></i>{{ $booking->guest_name }} </p>
                                </div>

                            </div>
                        </div>
                    </div>
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
        @for ($ticket = 0; $ticket < $booking->tickets_count; $ticket++)
            $('#printButton{{ $ticket }}').click(function() {
                console.log('clicked');
                var element = document.getElementById('ticketContent{{ $ticket }}');
                var opt = {
                    margin:       10,
                    filename:     'ticket_{{ $ticket }}.pdf',
                    image:        { type: 'jpeg', quality: 0.98 },
                    html2canvas:  { scale: 2 },
                    jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
                };

                // New Promise-based usage:
                html2pdf().set(opt).from(element).save();
            });
        @endfor
    });
</script>
@endsection

@endsection