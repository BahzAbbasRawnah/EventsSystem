@extends('layouts.app')

@section('content')
<div class="container py-3">
    <!-- عنوان الفعالية -->
    <h1 class="text-center mb-4  fw-bold">{{ $event->name }}</h1>

    <!-- الصورة الرئيسية -->
    <div class="text-center mb-5">
        <img src="{{ asset('storage/' . ($event->images->first()->path ?? 'default-image.jpg')) }}" 
             class="img-fluid rounded shadow-lg event-main-image" 
             alt="{{ __('pages.event_title') }}">
    </div>

    <!-- تفاصيل الفعالية -->
    <div class="row g-4">
        <!-- العمود الأيسر: وصف الفعالية والتفاصيل -->
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="card-title  mb-3 fw-bold">{{ __('pages.event_details') }}</h4>
                    <div class="d-flex align-items-start mb-2">
                        <i class="fas fa-info-circle text-primary mx-2"></i>
                        <p class="card-text "><strong>{{ __('pages.description') }}:</strong>{{ $event->description }}</p>
                    </div>
                    
                    <!-- السعر -->
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-dollar-sign fa-lg text-primary mx-2"></i>
                        <p class=" mb-0"><strong>{{ __('pages.price') }}:</strong> {{ $event->ticket_price }}</p>
                    </div>

<!-- التواريخ -->
<div class="row">
    <div class="col-md-6">
        <div class="d-flex align-items-center mb-3">
            <i class="fas fa-calendar-alt fa-lg text-primary mx-2"></i>
            <p class=" mb-0"><strong>{{ __('pages.start_date') }}:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}</p>
        </div>
        <div class="d-flex align-items-center mb-3">
            <i class="fas fa-clock fa-lg text-primary mx-2"></i>
            <p class=" mb-0"><strong>{{ __('pages.end_time') }}:</strong> {{ \Carbon\Carbon::parse($event->end_date)->format('H:i A') }}</p>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="d-flex align-items-center mb-3">
            <i class="fas fa-clock fa-lg text-primary mx-2"></i>
            <p class=" mb-0"><strong>{{ __('pages.start_time') }}:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('H:i A') }}</p>
        </div>
        <div class="d-flex align-items-center mb-3">
            <i class="fas fa-calendar-alt fa-lg text-primary mx-2"></i>
            <p class=" mb-0"><strong>{{ __('pages.end_date') }}:</strong> {{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d') }}</p>
        </div>
    
    </div>
</div>


                    <!-- الموقع -->
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt fa-lg text-primary mx-2"></i>
                        <p class=" mb-0">
                            <strong>{{ __('pages.location') }}:</strong> 
                            {{ $event->country->name }} - {{ $event->city->name }} - {{ $event->district->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- العمود الأيمن: معرض الصور -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="card-title  mb-4 fw-bold">{{ __('pages.event_gallery') }}</h4>
                    <div class="row g-2">
                        @foreach($event->images as $image)
                            <div class="col-6">
                                <img src="{{ asset('storage/' . $image->path) }}" 
                                     class="img-fluid rounded shadow-sm event-gallery-image" 
                                     alt="{{ __('pages.event_gallery') }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- أزرار الإجراءات -->
    <div class="text-center mt-5">
        <a href="{{ route('tickets.buy', $event->id) }}" class="btn btn-primary btn-lg px-5 py-2 m-2">
            {{ __('pages.buy_tickets') }}
        </a>
        <a href="{{ route('events.index') }}" class="btn btn-outline-secondary btn-lg px-5 py-2">
            {{ __('pages.back_to_events') }}
        </a>
    </div>
</div>
@endsection
