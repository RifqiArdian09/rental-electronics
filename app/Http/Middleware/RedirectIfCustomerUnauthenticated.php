<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfCustomerUnauthenticated
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('auth.customer-login');
        }

        return $next($request);
    }
}
