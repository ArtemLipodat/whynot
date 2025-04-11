<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceJsonResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->wantsJson()) {
            return response()->json([
                'message' => 'Необходимо указать заголовок Accept: application/json',
                'errors' => [
                    'accept_header' => ['Требуется заголовок Accept: application/json']
                ]
            ], 406);
        }

        return $next($request);
    }
}
