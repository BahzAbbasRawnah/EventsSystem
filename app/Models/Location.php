<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name_en', 'name_ar', 'points', 'country_id', 'city_id', 'district_id', 'latitude', 'longitude', 'address_en', 'address_ar'];

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
    
}
