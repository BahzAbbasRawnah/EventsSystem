@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-primary to-accent py-5 mb-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ __('pages.payment') }}</h1>
                <p class="lead mb-0">{{ __('pages.complete_your_purchase') }}</p>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
    <div class="row">
        <!-- Order Summary -->
        <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="card-custom sticky-lg-top" style="top: 100px; z-index: 10;">
                <div class="card-body p-4">
                    <h4 class="mb-4">{{ __('pages.order_summary') }}</h4>
                    
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('Assets/' . ($event->images->first()->path ?? 'default/default.jpg')) }}" 
                             class="rounded-custom me-3" alt="{{ $event->name }}"
                             style="width: 80px; height: 60px; object-fit: cover;">
                        <div>
                            <h5 class="mb-1">{{ $event->name }}</h5>
                            <div class="text-gray small">
                                <i class="fas fa-calendar-alt me-1"></i>
                                {{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-custom bg-light p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>{{ __('pages.ticket_price') }}</span>
                            <span>{{ $event->ticket_price }} {{ __('pages.currency') }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>{{ __('pages.quantity') }}</span>
                            <span>{{ $booking['quantity'] }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center fw-bold">
                            <span>{{ __('pages.total') }}</span>
                            <span>{{ $booking['quantity']*$event->ticket_price }} {{ __('pages.currency') }}</span>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <a href="{{ route('tickets.buy', $event->id) }}" class="btn-custom btn-outline-primary w-100">
                            <i class="fas fa-arrow-left me-2"></i> {{ __('pages.back_to_tickets') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Payment Form -->
        <div class="col-lg-8">
            <div class="card-custom">
                <div class="card-body p-4">
                    <h3 class="mb-4">{{ __('pages.payment_details') }}</h3>
                    
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
                    
                    <!-- Payment Methods Tabs -->
                    <ul class="nav nav-tabs mb-4" id="paymentTabs" role="tablist">
                        @if ($paymentMethods && $paymentMethods->count() > 0)
                            
                        @foreach($paymentMethods as $index => $method)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $index === 0 ? 'active' : '' }}" 
                                    id="method-{{ $method->id }}-tab" 
                                    data-bs-toggle="tab" 
                                    data-bs-target="#method-{{ $method->id }}" 
                                    type="button" role="tab" 
                                    aria-controls="method-{{ $method->id }}" 
                                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                <i class="fas fa-{{ $method->icon ?? 'credit-card' }} me-2"></i>
                                {{ $method->name }}
                            </button>
                        </li>
                        @endforeach
                        @endif

                    </ul>
                    
                    <!-- Payment Methods Content -->
                    <div class="tab-content" id="paymentTabsContent">
                        @if($paymentMethods && $paymentMethods->count() > 0)
                        @foreach($paymentMethods as $index => $method)
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" 
                             id="method-{{ $method->id }}" 
                             role="tabpanel" 
                             aria-labelledby="method-{{ $method->id }}-tab">
                            
                            <form action="{{ route('tickets.payment') }}" method="POST" class="payment-form">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <input type="hidden" name="quantity" value="{{ $booking['quantity'] }}">
                                <input type="hidden" name="name" value="{{ $booking['name'] }}">

                                <input type="hidden" name="total" value="{{ $booking['quantity']*$event->ticket_price }}">
                                <input type="hidden" name="payment_method_id" value="{{ $method->id }}">
                                @if($method->code != 'COD')
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="card_name" class="form-label">{{ __('pages.name_on_card') }} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                                                <input type="text" class="form-control form-control-custom" id="card_name" name="card_name" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="card_number" class="form-label">{{ __('pages.card_number') }} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-credit-card text-primary"></i></span>
                                                <input type="text" class="form-control form-control-custom" id="card_number" name="card_number" 
                                                       placeholder="XXXX XXXX XXXX XXXX" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="expiry_date" class="form-label">{{ __('pages.expiry_date') }} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-calendar-alt text-primary"></i></span>
                                                <input type="text" class="form-control form-control-custom" id="expiry_date" name="expiry_date" 
                                                       placeholder="MM/YY" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cvv" class="form-label">{{ __('pages.cvv') }} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-lock text-primary"></i></span>
                                                <input type="text" class="form-control form-control-custom" id="cvv" name="cvv" 
                                                       placeholder="XXX" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                                @elseif($method->name == 'Bank Transfer')
                                <div class="card-custom bg-light p-4 mb-4">
                                    <h5 class="mb-3">{{ __('pages.bank_details') }}</h5>
                                    <div class="mb-2">
                                        <strong>{{ __('pages.bank_name') }}:</strong> Saudi National Bank
                                    </div>
                                    <div class="mb-2">
                                        <strong>{{ __('pages.account_name') }}:</strong> Eventre LLC
                                    </div>
                                    <div class="mb-2">
                                        <strong>{{ __('pages.account_number') }}:</strong> 1234567890
                                    </div>
                                    <div class="mb-2">
                                        <strong>{{ __('pages.iban') }}:</strong> SA0380000000001234567890
                                    </div>
                                    <div class="mb-0">
                                        <strong>{{ __('pages.swift_code') }}:</strong> SANBSARI
                                    </div>
                                </div>
                                
                                <div class="form-group mb-4">
                                    <label for="transfer_reference" class="form-label">{{ __('pages.transfer_reference') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-hashtag text-primary"></i></span>
                                        <input type="text" class="form-control form-control-custom" id="transfer_reference" name="transfer_reference" required>
                                    </div>
                                    <div class="form-text">{{ __('pages.transfer_reference_help') }}</div>
                                </div>
                                @endif
                                
                                <div class="mt-4">
                                    <button type="submit" class="btn-custom btn-primary w-100 py-3">
                                        <i class="fas fa-lock me-2"></i> {{ __('pages.pay_now') }} ({{ $booking['quantity']*$event->ticket_price }} {{ __('pages.currency') }})
                                    </button>
                                </div>
                            </form>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    
                    <div class="mt-4 text-center">
                        <p class="text-gray mb-0">
                            <i class="fas fa-shield-alt me-2"></i>
                            {{ __('pages.secure_payment') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
