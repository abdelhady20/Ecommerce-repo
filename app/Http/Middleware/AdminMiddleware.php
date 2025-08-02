<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login.form')->with('error', 'You must login as admin.');
        }


        if (Auth::guard('admin')->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
