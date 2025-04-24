@if($events->isEmpty())
    <div class="text-center py-5">
        <div class="alert alert-info mb-4">
            {{ __('pages.no_events') }}
        </div>
        <img src="{{ asset('storage/default/empty.png') }}" alt="{{ __('pages.event_image') }}" class="img-fluid rounded-custom shadow-custom" style="max-width: 250px;">
    </div>
@else
    <!-- Events List -->
    <div class="row g-4">
        @foreach ($events as $event)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card-custom event-card h-100">
                <div class="position-relative">
                    <img src="{{ asset('Assets/' . ($event->images->first()->path ?? 'default/default.jpg')) }}"
                         class="card-img-top" alt="{{ $event->name }}">
                    <span class="event-badge">{{ $event->ticket_price }} {{ __('pages.currency') }}</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-3">{{ $event->name }}</h5>

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
                        <i class="fas fa-tag"></i>
                        <span>{{ $event->category->name }}</span>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('events.show', $event->id) }}" class="btn-custom btn-primary w-100">{{ __('pages.view_details') }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        {{ $events->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
    </div>
@endif
