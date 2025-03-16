<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->header('Authorization') || $request->header('Authorization') !== 'Bearer secret-token') {
            return response()->json(['message' => 'Unauthorized access'], 401);
        }

        return $next($request);
    }
}
