<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Switch the application locale
     */
    public function switch(string $locale)
    {
        // Validate locale
        $supportedLocales = ['en', 'ar'];

        if (in_array($locale, $supportedLocales)) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
