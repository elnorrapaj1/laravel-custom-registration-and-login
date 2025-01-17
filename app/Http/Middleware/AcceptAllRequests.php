<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class AcceptAllRequests
{
    public function handle($request, Closure $next)
    {
        // Regjistroni informacionin e kërkesës
        Log::info('Request Received', [
            'ip' => $request->ip(),
            'headers' => $request->headers->all(),
            'body' => $request->getContent(),
        ]);

        return $next($request);
    }
}
