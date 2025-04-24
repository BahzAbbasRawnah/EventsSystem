@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class=" bg-gradient-to-r from-primary to-accent  pt-5 pb-2 mb-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ __('pages.discover_events') }}</h1>
                <p class="lead mb-0">{{ __('pages.find_events_description') }}</p>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
    <!-- Filter Section -->
    <div class="card-custom mb-5">
        <div class="card-body p-4">
            <h4 class="mb-4">{{ __('pages.filter_events') }}</h4>

            <form id="filter-form" method="GET" action="{{ route('events.index') }}">
                <div class="row g-3">
                    <!-- Category Filter -->
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="category_id" class="form-label">{{ __('pages.category') }}</label>
                            <select class="form-select form-control-custom" id="category_id" name="category_id">
                                <option value="">{{ __('pages.select_category') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- City Filter -->
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="city_id" class="form-label">{{ __('pages.city') }}</label>
                            <select class="form-select form-control-custom" id="city_id" name="city_id">
                                <option value="">{{ __('pages.select_city') }}</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Filter Button -->
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn-custom btn-primary w-100 py-2">
                            <i class="fas fa-filter me-2"></i> {{ __('pages.filter') }}
                        </button>
                    </div>
                </div>
            </form>

            @if(request('category_id') || request('city_id'))
                <div class="mt-3">
                    <a href="{{ route('events.index') }}" class="btn-custom btn-sm btn-outline-secondary">
                        <i class="fas fa-times me-1"></i> {{ __('pages.clear_filters') }}
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Categories Quick Filter -->
    <div class="mb-5">
        <h4 class="mb-3">{{ __('pages.categories') }}</h4>
        <div class="d-flex flex-wrap gap-2">
            @foreach ($categories as $category)
                <a href="{{ route('events.index', ['category_id' => $category->id]) }}"
                   class="category-badge {{ request('category_id') == $category->id ? 'active' : '' }}">
                    <i class="fas fa-{{ $category->icon ?? 'tag' }} me-1"></i> {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Events List Section -->
    <div id="events-container">
        @include('events.partials.event_list')
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-submit form when select fields change
        document.querySelectorAll('#filter-form select').forEach(select => {
            select.addEventListener('change', function() {
                document.getElementById('filter-form').submit();
            });
        });
    });
</script>
@endsection