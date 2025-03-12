<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Traits\HasLocalizedAttributes;

class Event extends Model
{
    use HasFactory, SoftDeletes,HasLocalizedAttributes;

    protected $appends = [
        'name',
        'description',
        'country_name',
        'city_name',
        'district_name',
        'category_name',
        'images_list'
    ];

    protected $fillable = [
        'name_en', 'name_ar', 'ticket_price', 'tickets_quantity', 'category_id',
        'user_id', 'country_id', 'city_id', 'district_id', 'start_date',
        'end_date', 'description_en', 'description_ar', 'image', 'status'
    ];

    // Relationships
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function vendor()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // Accessors for Appended Attributes
    public function getCountryNameAttribute()
    {
        return $this->country ? $this->country->name : null;
    }

    public function getCityNameAttribute()
    {
        return $this->city ? $this->city->name : null;
    }

    public function getDistrictNameAttribute()
    {
        return $this->district ? $this->district->name : null;
    }

    public function getCategoryNameAttribute()
    {
        return $this->category ? $this->category->name : null;
    }

    public function getImagesListAttribute()
    {
        return $this->images->pluck('path'); 
    }
}
