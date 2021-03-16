<?php

namespace Acme\Infrastructure\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            return route('login');
        }

        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}
