<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('is_active', true)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        session(['user_id' => $user->id]);

        $redirectUrl = session('redirect_after_login', route('main-home'));
        $formData = session('checkout_form_data');

        session()->forget(['redirect_after_login', 'checkout_form_data']);

        if ($formData && str_contains($redirectUrl, 'checkout')) {
            return redirect($redirectUrl)->withInput($formData);
        }

        return redirect($redirectUrl);




    }
}
