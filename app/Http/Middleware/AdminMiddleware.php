<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // التأكد من أن المستخدم مسجل دخول
        if (!session()->has('user_id')) {
            return redirect()->route('login.form')->with('error', 'You must login as admin.');
        }

        // جلب بيانات المستخدم
        $user = User::find(session('user_id'));

        // التأكد أن الدور Admin
        if (!$user || $user->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
