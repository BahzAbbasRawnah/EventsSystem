<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLocalizedAttributes;
class Category extends Model
{
    use HasLocalizedAttributes;
    protected $fillable = ['name_en', 'name_ar'];
    //
    use SoftDeletes;
    protected $appends = ['name'];
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
