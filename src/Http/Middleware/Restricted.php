<?php

namespace Christhompsontldr\LaravelRestricted\Http\Middleware;

use Closure;

class Restricted
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
        // currently in restricted mode
        if (session('laravel-restricted.enabled', false)) {
            // protect anything that is not 'can:restricted'
            abort_unless(in_array('can:restricted', (array) $request->route()->getAction()['middleware']), 403);
        }

        return $next($request);
    }
}
