<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    public function handle($request, Closure $next)
    {
        Log::warning('Invalid Request Received', [
            'ip' => $request->ip(),
            'headers' => $request->headers->all(),
            'method' => $request->method(),
            'uri' => $request->path(),
            'body' => $request->getContent(),
        ]);

        return $next($request);
    }
}
