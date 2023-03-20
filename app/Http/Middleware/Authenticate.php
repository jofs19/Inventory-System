<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // NOTIFY USER
            
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
{
    $this->authenticate($request, $guards);

    $request->route()->middleware('throttle.login.with-message:3,1');

    return $next($request);
}
}
