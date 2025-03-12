@extends('layouts.app')

@section('content')
<!-- FAQ Section -->
<div class="container my-5">
    <h2 class="text-center  mb-4">{{ __('admin.faq') }}</h2>

    <div class="accordion" id="faqAccordion">
        @foreach($faqs as $index => $faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }} text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                        {{ $faq->question }}
                    </button>
                </h2>
                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {{ $faq->answer }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
