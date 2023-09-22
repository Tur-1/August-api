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

        // Check if the request originated from the allowed domain
        if ($request->headers->get('origin') !== config('app.backend_url')) {
            return redirect()->to(config('app.frontend_url'));
        }

        return $next($request);
    }
}
