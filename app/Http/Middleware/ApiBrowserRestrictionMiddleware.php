<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiBrowserRestrictionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $allowedDomains = [config('app.backend_url'),config('app.frontend_url')];

        // Check if the request originated from the allowed domain
        if (!in_array($request->headers->get('origin'),$allowedDomains)) {
            return abort(404);
        }

        return $next($request);
    }
}
