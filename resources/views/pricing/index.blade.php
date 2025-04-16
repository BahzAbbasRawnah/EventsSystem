@extends('layouts.app')

@section('content')

<div class="container py-2">
    <h2 class="text-center mb-4 ">{{ __('pages.pricing_plans') }}</h2>
    <p class="text-center mb-5">{{ __('pages.choose_plan') }}</p>

    <div class="row">
        @foreach ($pricingPackages as $package)
        <div class="col-md-4 mb-4">
            <div class="card event-card border-primary">
                <div class="card-header text-center">
                    <div class="plan-title">{{ $package->name }}</div>
                </div>
                <div class="card-body">
                    <h6 class=" mb-2 ">
                        ${{ $package->price }}/{{ $package->period }}
                    </h6>
                    <p class="card-text">
                        {{ $package->description }}
                    </p>
                    <ul class="list-unstyled mb-4">
                        @foreach ($package->features as $feature)
                        <li>
                            <i class="fas fa-check-circle text-primary mx-1"></i> 
                            {{$feature->name }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <p>{{ __('pages.have_questions') }} <a href="{{ route('contact') }}" class="text-primary">{{ __('pages.contact_us') }}</a></p>
    </div>
</div>

@endsection
