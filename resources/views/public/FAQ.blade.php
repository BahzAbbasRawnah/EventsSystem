@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-primary to-accent py-5 mb-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ __('pages.faq') }}</h1>
                <p class="lead mb-0">{{ __('pages.faq_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card-custom">
                <div class="card-body p-4">
                    <div class="accordion" id="faqAccordion">
                        @foreach($faqs as $index => $faq)
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }} rounded-custom shadow-sm"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}"
                                            aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $index }}">
                                        <i class="fas fa-question-circle text-primary me-3"></i>
                                        <span class="fw-semibold">{{ $faq->question }}</span>
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}"
                                     class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                     aria-labelledby="heading{{ $index }}"
                                     data-bs-parent="#faqAccordion">
                                    <div class="accordion-body p-4 bg-light rounded-bottom-custom">
                                        <p class="mb-0">{{ $faq->answer }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="text-center mt-5">
                <h3 class="mb-4">{{ __('pages.still_have_questions') }}</h3>
                <p class="text-gray mb-4">{{ __('pages.cant_find_answer') }}</p>
                <a href="{{ route('contact') }}" class="btn-custom btn-primary py-3 px-5">
                    <i class="fas fa-envelope me-2"></i> {{ __('pages.contact_us') }}
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles for FAQ Page -->
<style>
    .accordion-item {
        overflow: hidden;
    }

    .accordion-button {
        padding: 1.25rem 1.5rem;
        font-size: 1.1rem;
        background-color: white;
        color: var(--text-primary);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .accordion-button:not(.collapsed) {
        color: var(--primary);
        background-color: rgba(99, 102, 241, 0.05);
        box-shadow: 0 2px 4px rgba(99, 102, 241, 0.1);
    }

    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
        border-color: transparent;
    }

    .accordion-button::after {
        background-size: 1.25rem;
        transition: all 0.3s ease;
    }

    .rounded-custom {
        border-radius: 0.75rem;
    }

    .rounded-bottom-custom {
        border-bottom-left-radius: 0.75rem;
        border-bottom-right-radius: 0.75rem;
    }

    [data-theme="dark"] .accordion-button {
        background-color: var(--bg-card);
        color: var(--text-primary);
    }

    [data-theme="dark"] .accordion-button:not(.collapsed) {
        color: var(--primary-light);
        background-color: rgba(129, 140, 248, 0.1);
    }

    [data-theme="dark"] .accordion-body {
        background-color: var(--bg-secondary) !important;
    }
</style>
@endsection
