<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait HasLocalizedAttributes
{
    public function getNameAttribute()
    {
        $locale = App::getLocale(); // Get the current locale
        return $this->{"name_{$locale}"} ?? $this->name_ar; // Default to English if missing
    }
    public function getQuestionAttribute()
    {
        $locale = App::getLocale(); // Get the current locale
        return $this->{"question_{$locale}"} ?? $this->question_ar; // Default to English if missing
    }
    public function getAnswerAttribute()
    {
        $locale = App::getLocale(); // Get the current locale
        return $this->{"answer_{$locale}"} ?? $this->answer_ar; // Default to English if missing
    }

    public function getDescriptionAttribute()
    {
        $locale = App::getLocale(); 
        return $this->{"description_{$locale}"} ?? $this->description_ar; 
    }
}
