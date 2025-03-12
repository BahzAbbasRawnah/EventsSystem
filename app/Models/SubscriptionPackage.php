<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLocalizedAttributes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SubscriptionPackage extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriptionPackageFactory> */
    use HasFactory, SoftDeletes, HasLocalizedAttributes;
protected $fillable = [
    'name_ar',
    'name_en',
    'price',
    'period',
    'description',
];

protected $appends = ['name'];

    public function vendor()
    {
        return $this->belongsTo(User::class);
    }
    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'package_features', 'subscription_package_id', 'feature_id');
    }

    protected $casts = [
        'period' => 'string', // Ensure it's cast to a string for the translation logic
    ];

    // Create an accessor to get the translated period
    public function getPeriodAttribute($value)
    {
        // Return the translated value based on the current locale
        return trans('pages.periods.' . $value);
    }
    
}
