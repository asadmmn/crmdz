<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

// ...

public function handle($request, Closure $next, ...$guards)
{
    if (Auth::guard($guards)->check()) {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect('/users'); // Redirect admin to admin dashboard
        } elseif ($user->hasRole('recruiter')) {
            return redirect('/products'); // Redirect recruiter to recruiter dashboard
        }
    }

    return $next($request);
}

}
