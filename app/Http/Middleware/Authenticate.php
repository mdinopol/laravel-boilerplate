<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     *
     * @return string|null
     */
    protected function redirectTo(Request $request): void
    {
        if (!$request->expectsJson()) {
            abort(HttpResponse::HTTP_UNAUTHORIZED);
        }
    }
}
