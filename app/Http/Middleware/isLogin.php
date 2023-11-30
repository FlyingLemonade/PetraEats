<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected $except = [
        '/',
    ];
    public function handle(Request $request, Closure $next): Response
    {

        if (!in_array(auth()->user()->status_user, [1, 2, 3])) {
            abort(403);
        }
        return $next($request);
    }
}
