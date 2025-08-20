<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get supported locales from config
        $supportedLocales = array_keys(config('app.supported_locales', ['en']));
        $defaultLocale = config('app.locale', 'en');
        
        // Try to get locale from cookie first
        $locale = $request->cookie('app_locale');
        
        // Fallback to browser Accept-Language header if cookie doesn't exist
        if (!$locale) {
            $locale = $request->getPreferredLanguage($supportedLocales) ?: $defaultLocale;
        }
        
        // Validate locale - ensure it's supported
        if (!in_array($locale, $supportedLocales)) {
            $locale = $defaultLocale;
        }
        
        // Set the application locale
        App::setLocale($locale);
        
        // Store locale in cookie if it's not already set or different
        $response = $next($request);
        
        if (!$request->cookie('app_locale') || $request->cookie('app_locale') !== $locale) {
            return $response->withCookie(cookie('app_locale', $locale, 525600)); // 1 year
        }
        
        return $response;
    }
}