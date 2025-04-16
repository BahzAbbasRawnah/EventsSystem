<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with(['event', 'event.images', 'event.category', 'event.country', 'event.city', 'event.district'])
                            ->where('user_id', auth()->id())
                            ->get();
        
        return view('bookings.index', compact('bookings'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::with([
            'event',
            'event.images',
            'event.country',
            'event.city',
            'event.district'
        ])->find($id);
    
        // If booking doesn't exist, return a 404 or a custom message
        if (!$booking) {
            return abort(404, __('pages.booking_not_found'));
        }
    
        return view('bookings.show', compact('booking'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
