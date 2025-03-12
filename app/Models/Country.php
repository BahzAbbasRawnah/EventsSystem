<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLocalizedAttributes;

class Country extends Model
{
    use HasFactory,SoftDeletes,HasLocalizedAttributes;

    protected $fillable = [
        'name_en',
        'name_ar',
        'flag',
        'code',
    ];
protected $appends=['name'];
    public function cities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(City::class);
    }
}