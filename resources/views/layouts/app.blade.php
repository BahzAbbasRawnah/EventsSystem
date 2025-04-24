<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eventre') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('WebsiteAssets/images/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('WebsiteAssets/images/favicon.png') }}" type="image/png">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('WebsiteAssets/css/style.css') }}" rel="stylesheet">



    <!-- jQuery 3.7.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap 5.3.3 JavaScript Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- HTML2PDF.js for generating PDFs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            // Load theme from localStorage
            const savedTheme = localStorage.getItem("theme") || "light";
            $("html").attr("data-theme", savedTheme);
            updateThemeUI(savedTheme);

            // Apply theme to navbar
            if (savedTheme === "dark") {
                $('.navbar').removeClass('bg-white').addClass('bg-black navbar-dark');
            }

            // Theme toggle button click event
            $("#themeToggle").click(function () {
                const currentTheme = $("html").attr("data-theme");
                const newTheme = currentTheme === "light" ? "dark" : "light";
                $("html").attr("data-theme", newTheme);
                localStorage.setItem("theme", newTheme);
                updateThemeUI(newTheme);

                // Toggle navbar theme
                if (newTheme === "dark") {
                    $('.navbar').removeClass('bg-white').addClass('bg-black navbar-dark');
                } else {
                    $('.navbar').removeClass('bg-black navbar-dark').addClass('bg-white');
                }
            });

            // Function to update the theme UI
            function updateThemeUI(theme) {
                const themeIcon = $("#themeIcon");
                const themeToggle = $("#themeToggle");

                // Update icon
                if (theme === "dark") {
                    themeIcon.removeClass("fa-moon").addClass("fa-sun");
                    themeToggle.removeClass('btn-light').addClass('btn-dark');
                    themeToggle.css({
                        'color': '#fff',
                        'border': '2px solid #6366f1'
                    });
                } else {
                    themeIcon.removeClass("fa-sun").addClass("fa-moon");
                    themeToggle.removeClass('btn-dark').addClass('btn-light');
                    themeToggle.css({
                        'color': '#6366f1',
                        'border': '2px solid #a5b4fc'
                    });
                }
            }

            // Ensure Bootstrap navbar toggle works properly
            $('.navbar-toggler').on('click', function() {
                $('#mainNavbar').toggleClass('show');
            });

            // Initialize Bootstrap components
            // This ensures all Bootstrap components work properly
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })

            // Add active class to current nav item
            const currentPath = window.location.pathname;
            $('.navbar-nav .nav-link').each(function() {
                const href = $(this).attr('href');
                if (href && currentPath.includes(href) && href !== '/') {
                    $(this).addClass('active');
                } else if (currentPath === '/' && href === '/') {
                    $(this).addClass('active');
                }
            });
        });
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white fixed-top shadow-sm" id="mainNavbar">
        <div class="container-fluid px-lg-4">
            <!-- Brand/logo -->
            <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">
                <i class="fas fa-ticket-alt me-2"></i>Eventre
            </a>

            <!-- Navbar toggler for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!-- Main navigation links -->
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i>
                            <span>{{ __('pages.home') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('events.index') ? 'active' : '' }}" href="{{ route('events.index') }}">
                            <i class="fas fa-calendar-alt me-1"></i>
                            <span>{{ __('pages.events') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('pricing') ? 'active' : '' }}" href="{{ route('pricing') }}">
                            <i class="fas fa-tags me-1"></i>
                            <span>{{ __('pages.pricing') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="fas fa-info-circle me-1"></i>
                            <span>{{ __('pages.about') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                            <i class="fas fa-envelope me-1"></i>
                            <span>{{ __('pages.contact') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('FAQ') ? 'active' : '' }}" href="{{ route('FAQ') }}">
                            <i class="fas fa-question-circle me-1"></i>
                            <span>{{ __('pages.faq') }}</span>
                        </a>
                    </li>

                    <!-- Authentication Links -->
                    @auth
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="{{ route('bookings') }}">
                                <i class="fas fa-ticket-alt me-1"></i>
                                <span>{{ __('pages.my_bookings') }}</span>
                            </a>
                        </li>
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link fw-semibold" href="{{ route('admin') }}">
                                    <i class="fas fa-tachometer-alt me-1"></i>
                                    <span>{{ __('pages.dashboard') }}</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-1"></i>
                                <span>{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                                        <i class="fas fa-user me-2"></i>{{ __('pages.profile') }}
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="post" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>{{ __('pages.logout') }}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-primary btn-sm px-3 me-2" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1 d-lg-none"></i>
                                <span>{{ __('pages.register') }}</span>
                            </a>
                            <a class="btn btn-primary btn-sm px-3 mx-1" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1 d-lg-none"></i>
                                <span>{{ __('pages.login') }}</span>
                            </a>
                        </li>
                    @endauth

                    <!-- Language Switcher -->
                    <li class="nav-item dropdown ms-lg-2">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-globe me-1"></i>
                            <span>{{ app()->getLocale() == 'en' ? 'English' : 'العربية' }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{route('language.switch', ['locale' => 'en'])}}">
                                    <span>English</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('language.switch', ['locale' => 'ar'])}}">
                                    <span>العربية</span>
                                </a>

                            </li>
                        </ul>
                    </li>

                    <!-- Theme Toggle -->
                    <li class="nav-item ms-lg-2 mx-lg-2">
                        <button id="themeToggle" class="btn btn-sm rounded-circle" style="width: 38px; height: 38px;">
                            <i id="themeIcon" class="fas fa-moon"></i>
                        </button>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="margin-top: 76px; min-height: calc(100vh - 76px - 300px);">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="footer-title">Eventre</h5>
                    <p class="text-gray mb-4">{{ __('pages.footer_description') }}</p>
                    <div class="d-flex">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="footer-title">{{ __('pages.quick_links') }}</h5>
                    <a href="{{ route('home') }}" class="footer-link">{{ __('pages.home') }}</a>
                    <a href="{{ route('events.index') }}" class="footer-link">{{ __('pages.events') }}</a>
                    <a href="{{ route('pricing') }}" class="footer-link">{{ __('pages.pricing') }}</a>
                    <a href="{{ route('about') }}" class="footer-link">{{ __('pages.about') }}</a>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="footer-title">{{ __('pages.support') }}</h5>
                    <a href="{{ route('FAQ') }}" class="footer-link">{{ __('pages.faq') }}</a>
                    <a href="{{ route('contact') }}" class="footer-link">{{ __('pages.contact') }}</a>
                    <a href="#" class="footer-link">{{ __('pages.privacy_policy') }}</a>
                    <a href="#" class="footer-link">{{ __('pages.terms') }}</a>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h5 class="footer-title">{{ __('pages.newsletter') }}</h5>
                    <p class="text-gray mb-3">{{ __('pages.newsletter_description') }}</p>
                    <form class="d-flex">
                        <input type="email" class="form-control form-control-custom me-2" placeholder="{{ __('pages.your_email') }}">
                        <button type="submit" class="btn-custom btn-primary">{{ __('pages.subscribe') }}</button>
                    </form>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center text-gray">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('pages.all_rights_reserved') }}</p>
            </div>
        </div>
    </footer>

    <!-- App Scripts -->
    @vite('resources/js/app.js')
</body>
</html>
