<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLocalizedAttributes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Feature extends Model
{
    /** @use HasFactory<\Database\Factories\FeatureFactory> */
    use HasFactory, SoftDeletes, HasLocalizedAttributes;

    protected $fillable = ['name_en', 'name_ar'];
protected $appends = ['name'];

public function subscriptionPackages(): BelongsToMany
{
    return $this->belongsToMany(SubscriptionPackage::class, 'package_features', 'feature_id', 'subscription_package_id');
}

}
