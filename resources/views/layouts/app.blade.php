<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eventre') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">    
    <link href="{{ asset('WebsiteAssets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('WebsiteAssets/images/favicon.png') }}" rel="shortcut icon">
    
    <!-- Only one version of jQuery (3.7.1) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- Bootstrap 5.3.3 JavaScript Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- HTML2PDF.js for generating PDFs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
     

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Event Ticketing</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Regular Nav Links -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">{{ __('pages.home') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('events.index') }}">{{ __('pages.events') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pricing') }}">{{ __('pages.pricing') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">{{ __('pages.about') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">{{ __('pages.contact') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('FAQ') }}">{{ __('pages.faq') }}</a></li>
    
                    <!-- Authentication Dropdown -->
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bookings') }}">{{ __('pages.my_bookings') }}</a>
                    </li>
                    @if(auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('pages.dashboard') }}</a>
                    </li>
                    @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.show', auth()->user()->id) }}">{{ __('pages.profile') }}</a>
                                </li>
                                <li>
                                    <form method="post" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">{{ __('pages.logout') }}</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('pages.login') }}</a>
                        </li>
                    @endauth
    
                    <!-- Language Switcher Dropdown -->
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ app()->getLocale() == 'en' ? 'English' : ' العربية' }}
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="languageDropdown">
                            <li>
                                <a class="dropdown-item " href="{{ route('switchLang', ['locale' => 'en']) }}">
                                    <span role="img" aria-label="English">English</span> 
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item " href="{{ route('switchLang', ['locale' => 'ar']) }}">
                                    <span role="img" aria-label="Arabic">العربية</span> 
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

@yield('content')


<script>
    $(document).ready(function () {
        $('#languageSwitcher').change(function () {
            let selectedLang = $(this).val();
            let form = $('#langSwitcherForm');
            let action = "{{ route('switchLang', ['locale' => ':locale']) }}".replace(':locale', selectedLang);
            form.attr('action', action).submit();
        });
    });
</script>
</body>
</html>
