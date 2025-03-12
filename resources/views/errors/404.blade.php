@extends('layouts.app')

@section('content')

<div class="container d-flex flex-column align-items-center justify-content-center vh-100 text-center">
    <h1 class="error-title">404</h1>
    <h2 class="text-dark">Oops! Page Not Found</h2>
    <p class="text-muted">The page you're looking for doesn't exist or has been moved.</p>
    <a href="index.html" class="btn btn-primary"><i class="fas fa-home"></i> Back to Home</a>
</div>

@endsection