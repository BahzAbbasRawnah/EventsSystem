@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-primary to-accent  py-5 mb-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ __('pages.buy_tickets') }}</h1>
                <p class="lead mb-0">{{ __('pages.secure_your_spot') }}</p>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
    <div class="row">
        <!-- Event Details -->
        <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="card-custom sticky-lg-top" style="top: 100px; z-index: 10;">
                <div class="position-relative">
                    <img src="{{ asset('Assets/' . ($event->images->first()->path ?? 'default/default.jpg')) }}" 
                         class="card-img-top" alt="{{ $event->name }}">
                    <span class="event-badge">{{ $event->ticket_price }} {{ __('pages.currency') }}</span>
                </div>
                <div class="card-body">
                    <h4 class="card-title mb-3">{{ $event->name }}</h4>
                    
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
                    
                    <div class="event-info">
                        <i class="fas fa-ticket-alt"></i>
                        <span>{{ __('pages.available_tickets') }}: <strong>{{ $event->tickets_quantity }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Ticket Form -->
        <div class="col-lg-7">
            <div class="card-custom">
                <div class="card-body p-4">
                    <h3 class="mb-4">{{ __('pages.ticket_details') }}</h3>
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <form action="{{ route('tickets.payment_process') }}" method="POST">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">{{ __('pages.full_name') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                                        <input type="text" class="form-control form-control-custom @error('name') is-invalid @enderror" 
                                               id="name" name="name" value="{{ old('name', auth()->user()->name ?? '') }}" required>
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">{{ __('pages.email') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-envelope text-primary"></i></span>
                                        <input type="email" class="form-control form-control-custom @error('email') is-invalid @enderror" 
                                               id="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}" required>
                                    </div>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">{{ __('pages.mobile') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-phone text-primary"></i></span>
                                        <input type="tel" class="form-control form-control-custom @error('phone') is-invalid @enderror" 
                                               id="phone" name="phone" value="{{ old('phone', auth()->user()->phone ?? '') }}" required>
                                    </div>
                                    @error('phone')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity" class="form-label">{{ __('pages.number_of_tickets') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-ticket-alt text-primary"></i></span>
                                        <input type="number" class="form-control form-control-custom @error('quantity') is-invalid @enderror" 
                                               id="quantity" name="quantity" value="{{ old('quantity', 1) }}" min="1" max="{{ $event->available_tickets }}" required>
                                    </div>
                                    @error('quantity')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="card-custom bg-light p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>{{ __('pages.ticket_price') }}</span>
                                        <span>{{ $event->ticket_price }} {{ __('pages.currency') }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>{{ __('pages.quantity') }}</span>
                                        <span id="display-quantity">1</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center fw-bold">
                                        <span>{{ __('pages.total') }}</span>
                                        <span id="total-price">{{ $event->ticket_price }} {{ __('pages.currency') }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        {{ __('pages.agree_terms') }} <a href="#" class="text-primary">{{ __('pages.terms_and_conditions') }}</a>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn-custom btn-primary w-100 py-3">
                                    <i class="fas fa-shopping-cart me-2"></i> {{ __('pages.proceed_to_payment') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInput = document.getElementById('quantity');
        const displayQuantity = document.getElementById('display-quantity');
        const totalPrice = document.getElementById('total-price');
        const ticketPrice = {{ $event->ticket_price }};
        const currency = '{{ __('pages.currency') }}';
        
        function updateTotal() {
            const quantity = parseInt(quantityInput.value) || 1;
            displayQuantity.textContent = quantity;
            totalPrice.textContent = (ticketPrice * quantity) + ' ' + currency;
        }
        
        quantityInput.addEventListener('input', updateTotal);
        updateTotal();
    });
</script>
@endsection
