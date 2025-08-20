<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     *
     * @param string $locale
     * @param Request $request
     * @return RedirectResponse
     */
    public function switch(string $locale, Request $request): RedirectResponse
    {
        // Get supported locales from config
        $supportedLocales = array_keys(config('app.supported_locales', ['en']));
        
        // Validate the requested locale
        if (!in_array($locale, $supportedLocales)) {
            return redirect()->back()->withErrors(['locale' => 'Unsupported language selected.']);
        }
        
        // Create redirect response to previous page or dashboard
        $redirect = redirect()->back();
        
        // Set the locale cookie (1 year expiration)
        $redirect->withCookie(cookie('app_locale', $locale, 525600));
        
        return $redirect->with('success', 'Language changed successfully.');
    }
    
    /**
     * Get current locale information
     *
     * @param Request $request
     * @return array
     */
    public function current(Request $request): array
    {
        $currentLocale = app()->getLocale();
        $supportedLocales = config('app.supported_locales', []);
        
        return [
            'current' => $currentLocale,
            'name' => $supportedLocales[$currentLocale]['name'] ?? 'Unknown',
            'flag' => $supportedLocales[$currentLocale]['flag'] ?? '🏳️',
            'supported' => $supportedLocales,
        ];
    }
}