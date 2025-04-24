@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-primary to-accent  py-5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ __('pages.my_profile') }}</h1>
                <p class="lead mb-0">{{ __('pages.profile_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
    <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card-custom sticky-lg-top" style="top: 100px; z-index: 10;">
                <div class="profile-sidebar">
                    <div class="profile-image">
                        @if($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle">
                        @else
                            <div class="profile-avatar">
                                <span>{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="profile-info text-center">
                        <h4 class="mb-1">{{ $user->name }}</h4>
                        <p class="text-gray mb-3">{{ $user->email }}</p>
                        <p class="badge bg-primary">{{ ucfirst($user->role) }}</p>
                    </div>
                    
                    <hr>
                    
                    <div class="profile-menu">
                        <a href="{{ route('profile.show') }}" class="profile-menu-item active">
                            <i class="fas fa-user"></i>
                            <span>{{ __('pages.profile_info') }}</span>
                        </a>
                        <a href="{{ route('bookings') }}" class="profile-menu-item">
                            <i class="fas fa-ticket-alt"></i>
                            <span>{{ __('pages.my_bookings') }}</span>
                        </a>
                        <a href="{{ route('profile.edit') }}" class="profile-menu-item">
                            <i class="fas fa-cog"></i>
                            <span>{{ __('pages.account_settings') }}</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="profile-menu-item text-danger border-0 bg-transparent w-100 text-start">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>{{ __('pages.logout') }}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="col-lg-8">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <!-- Profile Information -->
            <div class="card-custom mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('pages.profile_information') }}</h5>
                    <a href="{{ route('profile.edit') }}" class="btn-custom btn-sm btn-primary">
                        <i class="fas fa-edit me-1"></i> {{ __('pages.edit') }}
                    </a>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="profile-detail">
                                <div class="profile-detail-label">{{ __('pages.full_name') }}</div>
                                <div class="profile-detail-value">{{ $user->name }}</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="profile-detail">
                                <div class="profile-detail-label">{{ __('pages.email') }}</div>
                                <div class="profile-detail-value">{{ $user->email }}</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="profile-detail">
                                <div class="profile-detail-label">{{ __('pages.mobile') }}</div>
                                <div class="profile-detail-value">{{ $user->phone ?? __('pages.not_provided') }}</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="profile-detail">
                                <div class="profile-detail-label">{{ __('pages.member_since') }}</div>
                                <div class="profile-detail-value">{{ $user->created_at->format('M d, Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Bookings -->
            <div class="card-custom">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('pages.recent_bookings') }}</h5>
                    <a href="{{ route('bookings') }}" class="btn-custom btn-sm btn-outline-primary">
                        {{ __('pages.view_all') }}
                    </a>
                </div>
                <div class="card-body">
                    @if($user->bookings && $user->bookings->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('pages.event') }}</th>
                                        <th>{{ __('pages.date') }}</th>
                                        <th>{{ __('pages.tickets') }}</th>
                                        <th>{{ __('pages.status') }}</th>
                                        <th>{{ __('pages.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user->bookings->take(5) as $booking)
                                        <tr>
                                            <td>{{ $booking->event->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->event->start_date)->format('M d, Y') }}</td>
                                            <td>{{ $booking->tickets_count }}</td>
                                            <td>
                                                @if($booking->status == 'pending')
                                                    <span class="badge bg-warning">{{ __('pages.pending') }}</span>
                                                @elseif($booking->status == 'approved')
                                                    <span class="badge bg-success">{{ __('pages.approved') }}</span>
                                                @elseif($booking->status == 'cancelled')
                                                    <span class="badge bg-danger">{{ __('pages.cancelled') }}</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ $booking->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('bookings.show', $booking->id) }}" class="btn-custom btn-sm btn-outline-primary">
                                                    {{ __('pages.view') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="empty-state-icon mb-3">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <h5>{{ __('pages.no_bookings_yet') }}</h5>
                            <p class="text-gray mb-4">{{ __('pages.no_bookings_message') }}</p>
                            <a href="{{ route('events.index') }}" class="btn-custom btn-primary">
                                {{ __('pages.browse_events') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
