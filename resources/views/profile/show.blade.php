@extends('layouts.app')

@section('content')
<div class="container p-2">
    <div class="row justify-content-center m-2 m-md-0">
        <div class="col-md-4 border border-primary rounded-3 p-4">
            <div class="card">
                <div class="card-header text-center">
                    <h3>{{ __('pages.edit_profile') }}</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('pages.full_name') }}</label>
                        <input type="text" class="form-control text-black" value="{{ $user->name }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('pages.email') }}</label>
                        <input type="email" class="form-control text-black" value="{{ $user->email }}" readonly>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">{{ __('pages.edit_profile') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection