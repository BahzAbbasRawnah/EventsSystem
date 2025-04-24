<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = \App\Models\Category::all();
        $events=\App\Models\Event::all();
        $featuredEvents = \App\Models\Event::with(['category', 'country', 'city', 'images'])
            ->take(5)
            ->get();
            $events = \App\Models\Event::with(['category', 'country', 'city', 'images'])
            ->take(5)
            ->get();
            // dd($events);
        return view('home', compact('categories', 'events','featuredEvents'));
    }
}
