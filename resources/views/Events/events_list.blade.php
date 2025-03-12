@foreach ($events as $event)
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('storage/' . ($event->images->first()->path ?? 'default-image.jpg')) }}" 
                 class="card-img-top event-image" 
                 alt="Event Image">
            <div class="card-body">
                <h5 class="card-title text-dark fw-bold">{{ $event->name }}</h5>
                
                <!-- Price -->
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-dollar-sign  mx-2"></i>
                    <p class="card-text text-dark mb-0"> {{ $event->ticket_price }}</p>
                </div>

                <!-- Dates -->
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-calendar-alt  mx-2"></i>
                    <p class="card-text text-dark mb-0 mx-2">{{ $event->start_date }}</p>
                    <i class="fas fa-calendar-alt  mx-2"></i>
                    <p class="card-text text-dark mb-0">{{ $event->end_date }}</p>
                </div>

                <!-- Location -->
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-map-marker-alt  mx-2"></i>
                    <p class="card-text text-dark mb-0">
                        {{ $event->country->name }} - {{ $event->city->name }} - {{ $event->district->name }}
                    </p>
                </div>

                <!-- View Details Button -->
                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary w-100">{{ __('pages.view_details') }}</a>
            </div>
        </div>
    </div>
@endforeach