<?php

use Modules\Language\Entities\Language;

if (!function_exists('passwordRegex')) {
    function passwordRegex()
    {
        return config('auth.password_regex.rule');
    }
}

if( !( function_exists('getLanguageCodeById') ) ){

    function getLanguageCodeById($lang_id)
    {
        return Language::find($lang_id)->code;
    }
}


