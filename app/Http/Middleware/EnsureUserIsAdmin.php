<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Log::info('before code execution');
        if(!auth()->user()->is_admin){
            abort(403);
        }
        $response=  $next($request);
        //Log::info('after code execution');
        return $response;
    }
}
