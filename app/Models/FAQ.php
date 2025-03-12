<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLocalizedAttributes;

class FAQ extends Model
{
use HasLocalizedAttributes;
    protected $table = 'faqs';
    protected $appends = ['question', 'answer'];

    protected $fillable = [
        'question_ar',
        'question_en',
        'answer_ar',
        'answer_en',
        'is_active',
    ];
}
