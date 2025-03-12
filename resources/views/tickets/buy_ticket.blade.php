@extends('layouts.app')

@section('content')
    <!-- Ticket Booking Section -->
    <div class="container py-5">
        <div class="row g-4">
            <!-- Event Details Column -->
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body">
                        <h2 class=" fw-bold mb-4">{{ __('pages.event_details') }}</h2>

                        <ul class="list-unstyled">
                            <li class="mb-3 "><i class="fas fa-tag text-primary mx-2"></i><strong>{{ __('pages.category') }}:</strong> {{ $event->category->name }}</li>
                            <li class="mb-3 "><i class="fas fa-calendar-check text-primary mx-2"></i><strong>{{ __('pages.event_name') }}:</strong> {{ $event->name }}</li>
                            <li class="mb-3 "><i class="fas fa-calendar-alt text-primary mx-2"></i><strong>{{ __('pages.date') }}:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('M d, Y') }}</li>
                            <li class="mb-3 "><i class="fas fa-clock text-primary mx-2"></i><strong>{{ __('pages.time') }}:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}</li>
                            <li class="mb-3 "><i class="fas fa-map-marker-alt text-primary mx-2"></i><strong>{{ __('pages.location') }}:</strong> {{ $event->country->name }} - {{ $event->city->name }} - {{ $event->district->name }}</li>
                            <li class="mb-3 "><i class="fas fa-dollar-sign text-primary mx-2"></i><strong>{{ __('pages.price') }}:</strong> ${{ number_format($event->ticket_price, 2) }}</li>
                            <li class=""><i class="fas fa-chair text-primary mx-2"></i><strong>{{ __('pages.seats_available') }}:</strong> {{ $event->tickets_quantity > 0 ? __('pages.limited')  . $event->tickets_quantity : __('pages.sold_out') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Booking Form Column -->
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body p-4">
                        <h2 class=" fw-bold mb-3">{{ __('pages.book_ticket') }}</h2>
                        <form method="post" action="{{ route('tickets.payment_process') }}">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">

                            <div class="mb-2">
                                <label for="name" class="form-label ">{{ __('pages.full_name') }}</label>
                                <input type="text" name="guest_name" class="form-control" id="name" placeholder="{{ __('pages.full_name') }}" required>
                            </div>

        

                            <div class="mb-2">
                                <label for="quantity" class="form-label ">{{ __('pages.quantity') }}</label>
                                <input type="number" class="form-control" name="quantity" id="quantity" min="1" max="{{ $event->tickets_quantity }}" value="1" required>
                            </div>

                            <div class="mb-2">
                                <label for="price" class="form-label ">{{ __('pages.price') }}</label>
                                <input type="text" name="price" class="form-control" id="price" value="{{ number_format($event->ticket_price, 2) }}" readonly>
                            </div>
                            <div class="mb-2">
                                <label for="total_price" class="form-label ">{{ __('pages.total_price') }}</label>
                                <input type="text" name="total_price" class="form-control" id="total_price" value="${{ number_format($event->ticket_price, 2) }}" readonly>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2">{{ __('pages.proceed_to_payment') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (Make sure to include jQuery before using this script) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#quantity').on('input', function () {
            let price = parseFloat($('#price').val());
            let quantity = parseInt($(this).val());
            let totalPrice = price * quantity;

            // Ensure quantity is valid
            if (isNaN(quantity) || quantity < 1) {
                quantity = 1;
                $(this).val(1);
            }

            $('#total_price').val(totalPrice.toFixed(2)); 
        });
    });
</script>
@endsection