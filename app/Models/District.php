<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLocalizedAttributes;

class District extends Model
{
    protected $fillable = ['name_en', 'name_ar', 'city_id'];

    /** @use HasFactory<\Database\Factories\DistrictFactory> */
    use HasFactory, SoftDeletes, HasLocalizedAttributes;
protected $appends = ['name'];
    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
