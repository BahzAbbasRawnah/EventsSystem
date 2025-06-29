<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PricingPackageController;

Route::get('/user', [PricingPackageController::class, 'user'])->name('user');

