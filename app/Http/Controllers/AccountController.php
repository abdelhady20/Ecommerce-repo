<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController
{
    public function index()
    {
        $user = User::findOrFail(session('user_id'));
        return view('website.account', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed',
        ]);

        $user = User::findOrFail(session('user_id'));

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }
    public function addresses()
    {
        $user = User::with('addresses')->findOrFail(session('user_id'));
        return view('website.account_addresses', compact('user'));
    }

    public function setDefaultAddress($id)
    {
        $user = User::findOrFail(session('user_id'));
        $user->addresses()->update(['is_default' => false]);
        $address = $user->addresses()->findOrFail($id);
        $address->update(['is_default' => true]);

        return back()->with('success', 'Default address updated successfully.');
    }
    public function deleteAddress($id)
    {
        $user = auth()->user() ?? User::find(session('user_id'));

        $address = $user->addresses()->findOrFail($id);

        if ($address->is_default) {
            $user->addresses()->where('id', '!=', $address->id)->update(['is_default' => false]);
        }

        $address->delete();

        return back()->with('success', 'Address deleted successfully.');
    }


}
