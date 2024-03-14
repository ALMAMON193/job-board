<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role == null) {

            return redirect()->route('home');
        }
        if ($request->user()->role != 'admin') {
            session()->flash('error', 'You are Not Authorize to access this page');
            return redirect()->route('account.profile');
        }
        return $next($request);
    }
}
