<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\PublicPagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PricingPackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;

// Language Switch Route

Route::get('language/{locale}', [LanguageController::class, 'switch'])
    ->name('language.switch');

Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('switchLang');

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pricing', [PricingPackageController::class, 'index'])->name('pricing');
Route::get('/about', [PublicPagesController::class, 'about'])->name('about');
Route::get('/contact', [PublicPagesController::class, 'contact'])->name('contact');
Route::get('/FAQ', [PublicPagesController::class, 'FAQ'])->name('FAQ');

// Authentication Routes
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
    Route::get('/register', [AuthController::class, 'create'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');

    Route::get('/password/forgot', [AuthController::class, 'forgot'])->name('password.forgot');


});

// Error Pages
Route::get('/error/404', [ErrorController::class, 'notFound'])->name('error.404');
Route::get('/error/500', [ErrorController::class, 'serverError'])->name('error.500');

// Events Routes (Users can browse and view event details)
Route::resource('/events', EventsController::class)->only(['index', 'show']);
Route::middleware('auth')->group(function () {
    Route::resource('/events', EventsController::class)->except(['index', 'show']);
    Route::get('/events/filter', [EventsController::class, 'filterEvents'])->name('events.filter');
});

Route::get('/admin/dashboard', function () {
    return redirect()->route('filament.admin.pages.dashboard');
})->name('admin')->middleware('auth');

// Ticket Routes
Route::prefix('tickets')->group(function () {
    Route::get('/buy/{id}', [TicketsController::class, 'create'])->name('tickets.buy');

    Route::middleware('auth')->group(function () {
        Route::post('/payment', [TicketsController::class, 'store'])->name('tickets.payment');
        Route::post('/payment_process', [TicketsController::class, 'payment_process'])->name('tickets.payment_process');
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
        Route::post('/contact-us', [PublicPagesController::class, 'contact_store'])->name('contact.store');


    });
});

// Booking Routes (Require Auth)
Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings')->middleware('auth');
Route::get('/bookings/{id}', [BookingsController::class, 'show'])->name('bookings.show')->middleware('auth');

