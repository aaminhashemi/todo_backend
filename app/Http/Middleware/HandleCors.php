<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleCors
{
    public function handle(Request $request, Closure $next)
    {
        // Add CORS headers
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')///*https://todo-frontend-tmrg.onrender.com*/
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With'); // Allow specific headers
    }
}
