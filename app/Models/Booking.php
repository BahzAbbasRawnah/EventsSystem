<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = [
        'payment_details',
    ];

    protected $fillable = [
        'event_id',
        'user_id',
        'payment_id',
        'guest_name',
        'tickets_count',
        'ticket_price',
        'total_price',
        'status',
    ];

    // Relationships
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    // Accessor for payment details
    public function getPaymentDetailsAttribute()
    {
        return $this->payment ? [
            'id' => $this->payment->id,
            'method' => $this->payment->method,
            'status' => $this->payment->status,
            'amount' => $this->payment->amount,
        ] : null;
    }
}
