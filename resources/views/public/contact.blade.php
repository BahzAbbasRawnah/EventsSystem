@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div class="container py-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center flex-column align-items-center">
                <h2 >{{ __('pages.contact_title') }}</h2>
                <p >{{ __('pages.contact_description') }}</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt icon-primary"></i> {{ __('pages.address') }}</li>
                    <li><i class="fas fa-envelope icon-primary"></i> {{ __('pages.email') }}</li>
                    <li><i class="fas fa-phone icon-primary"></i> {{ __('pages.phone') }}</li>
                </ul>
                <div class="mt-4">
                    <a href="#" class="btn btn-primary"><i class="fab fa-facebook-f"></i> {{ __('pages.facebook') }}</a>
                    <a href="#" class="btn btn-primary"><i class="fab fa-twitter"></i> {{ __('pages.twitter') }}</a>
                    <a href="#" class="btn btn-primary"><i class="fab fa-instagram"></i> {{ __('pages.instagram') }}</a>
                </div>
            </div>
            <div class="col-md-6 mt-2 m-md-0">
                <h2 >{{ __('pages.form_title') }}</h2>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label ">{{ __('pages.form.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('pages.form.name_placeholder') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label ">{{ __('pages.form.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('pages.form.email_placeholder') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label ">{{ __('pages.form.message') }}</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="{{ __('pages.form.message_placeholder') }}" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('pages.form.submit') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
