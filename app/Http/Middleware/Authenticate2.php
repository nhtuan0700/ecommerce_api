<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = 'web')
    {
        if (!Auth::check()) {
            if ($guard === 'api') {
                return response()->json([
                    'message' => 'Unauthenticated'
                ], 401);
            } else {
                return redirect(route('login'));
            }
        }
        return $next($request);
    }
}
