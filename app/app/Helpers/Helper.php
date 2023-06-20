<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('is_male_localisation')) {
    function is_male_localisation($key)
    {
        $isMale = filter_var(trans($key), FILTER_VALIDATE_BOOLEAN);
        // dd($isMale);
        if ($isMale) {
            return 'un';
        } else {
            return 'une';
        }
    }
}

if (!function_exists('app_menu')) {
    function app_menu()
    {
        if (Session::get('user') != "admin") {
            return App\Models\MenuItem::where("description", Session::get("user"))->orWhere("description", null)->get()->groupBy('menu_group.nom');
        }
        else{
            return App\Models\MenuItem::where("description", Session::get("user"))->get()->groupBy('menu_group.nom');

        }
    }
}
