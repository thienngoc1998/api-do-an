<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if ($request->bearerToken() === null) {
            session()->remove('login_token');
            throw new UnauthorizedHttpException('Unauthorized');
        }

        if (session()->get('login_token') !== $request->bearerToken()) {
            Auth::logout();
            session()->remove('login_token');
            throw new UnauthorizedHttpException('Unauthorized');
        }

        return parent::handle($request, $next, ...$guards);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
