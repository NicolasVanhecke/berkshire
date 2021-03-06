<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        app()->setLocale($request->segment(1)); // take first part of path to set locale
        return $next($request);
    }
}
