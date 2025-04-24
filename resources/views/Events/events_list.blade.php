@foreach ($events as $event)
    <div class="event-card">
        <div class="relative overflow-hidden">
            <img src="{{ asset('storage/' . ($event->images->first()->path ?? 'default-image.jpg')) }}"
                class="event-image"
                alt="{{ $event->name }}">
            <div class="absolute top-3 right-3 badge badge-primary">
                {{ $event->ticket_price }} {{ __('pages.currency') }}
            </div>
        </div>

        <div class="card-body">
            <h3 class="card-title">{{ $event->name }}</h3>

            <!-- Date & Time -->
            <div class="flex flex-wrap gap-2 mb-3">
                <div class="event-info">
                    <i class="fas fa-calendar-alt event-info-icon"></i>
                    <span>{{ \Carbon\Carbon::parse($event->start_date)->format('M d') }}</span>
                </div>
                <div class="event-info">
                    <i class="fas fa-clock event-info-icon"></i>
                    <span>{{ \Carbon\Carbon::parse($event->start_date)->format('h:i A') }}</span>
                </div>
            </div>

            <!-- Location -->
            <div class="event-info mb-4">
                <i class="fas fa-map-marker-alt event-info-icon"></i>
                <span class="truncate">
                    {{ $event->city->name }}, {{ $event->country->name }}
                </span>
            </div>

            <!-- View Details Button -->
            <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary w-full">
                {{ __('pages.view_details') }}
            </a>
        </div>
    </div>
@endforeach