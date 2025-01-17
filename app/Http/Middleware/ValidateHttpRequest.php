<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ValidateHttpRequest
{
    public function handle(Request $request, Closure $next)
    {
        // Log incoming requests for debugging
        Log::debug('ValidateHttpRequest Middleware: Incoming request', [
            'IP' => $request->ip(),
            'Method' => $request->method(),
            'URI' => $request->getPathInfo(),
            'Headers' => $request->headers->all(),
            'Body' => $request->all(),
        ]);

        // Uncomment and adjust the method check if necessary
        // if (!$request->isMethod('GET') && !$request->isMethod('POST')) {
        //     abort(400, 'Invalid request method');
        // }

        // Additional validation logic can be added here

        return $next($request);
    }
}
