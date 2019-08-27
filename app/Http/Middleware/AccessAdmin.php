<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
{
    $user = $request->user();

    if (!$user || !$user->isAdmin()) {
        throw new AuthenticationException;
    }

    return $next($request);
}
}
