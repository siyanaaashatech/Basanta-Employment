<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

class TranslationHelper
{
    public static function translate($key, $locale = null)
    {
        // If no locale is provided, use the current locale
        $locale = $locale ?: App::getLocale();

        // Retrieve translation for the key based on the current locale
        return trans($key, [], $locale);
    }
}