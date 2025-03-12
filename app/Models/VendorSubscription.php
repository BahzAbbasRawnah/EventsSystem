<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorSubscription extends Model
{
    /** @use HasFactory<\Database\Factories\VendorSubscriptionFactory> */
    use HasFactory, SoftDeletes;

    public function vendor()
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptionPackage()
    {
        return $this->belongsTo(SubscriptionPackage::class);
    }
}
