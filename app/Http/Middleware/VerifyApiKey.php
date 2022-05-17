<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class VerifyApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
        $apiKey = $request->header('API-Key');
        if (config('guide-x.api.api_key') === $apiKey) {
            return $next($request);
        }
        throw new AuthenticationException('API Key is required');
    }
}
