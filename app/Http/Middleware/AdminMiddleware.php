<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    
    public function handle(Request $request, Closure $next): Response
    {
         if (! $request->user()) {
            return redirect()->route('login');
        }

        // Nếu đã login mà không phải admin, ném 403
        if ($request->user()->role !== 'admin') {
            abort(403, 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
