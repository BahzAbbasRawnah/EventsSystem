<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ErrorController extends Controller
{
    /**
     * Handle 404 Not Found errors.
     */
    public function notFound(): View
    {
        return view('errors.404');
    }

    /**
     * Handle 500 Internal Server errors.
     */
    public function serverError(): View
    {
        return view('errors.500');
    }
}
