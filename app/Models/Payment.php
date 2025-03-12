<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'card_name',
        'card_number',
        'cvv',
        'amount',
        'payment_method_id',
        'status',
        
    ];
}
