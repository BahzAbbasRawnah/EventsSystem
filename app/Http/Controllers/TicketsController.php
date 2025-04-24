<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\User;
class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bookings.buy_ticket');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( $id )
    {
        $user=auth()->user();
        $event = Event::with(['category','country','city','district','images'])->findOrFail($id);
        return view('tickets.buy_ticket', compact('event','user'));

    }

    public function show($id)
    {
        $event = Event::with(['category','country','city','district','images'])->find($id);
        return view('tickets.buy_ticket', compact('event'));
    }


    public function payment_process(Request $request)
    {

        $event=Event::with(['category','country','city','district'])-> findOrFail($request->event_id);
        $booking=[
            'name'=>$request->name,
            'email'=>$request->email,
            'quantity'=>$request->quantity,
        ];
        $paymentMethods=PaymentMethod::all();
        return view('tickets.payment',compact('paymentMethods','event','booking'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $payment=Payment::create([
            'event_id'=>$request->event_id,
            'user_id'=>auth()->id(),
            'payment_method_id'=>$request->payment_method_id,
            'amount'=>$request->total,
            'card_name'=>$request->card_name,
            'card_number'=>$request->card_number,
            'cvv'=>$request->cvv
        ]);

        if($payment){
            $event=Event::findOrFail($request->event_id);
            $booking=Booking::create([
                'event_id'=>$request->event_id,
                'user_id'=>auth()->id(),
                'payment_id'=>$payment->id,
                'guest_name'=>$request->name,
                'tickets_count'=>$request->quantity,
                'ticket_price'=>$event->ticket_price,
                'total_price'=>$request->tickets_count*$event->ticket_price,
                'status'=>'pending'
            ]);

        }

        if($booking){
            return redirect()->route('bookings')->with('success','Ticket Booked Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

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
