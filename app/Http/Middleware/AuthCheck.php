<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{

    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user_id')) {
            session(['redirect_after_login' => url()->previous()]);
            if ($request->isMethod('post')) {
                session(['checkout_form_data' => $request->all()]);
            }
            return redirect()->route('login.form');
        }

        return $next($request);
    }
}
