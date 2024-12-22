<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function showResetForm()
    {
        return view('reset_password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('username', $request->username)
                    ->where('email', $request->email)
                    ->first();

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('status', 'Password berhasil diubah');
        }

        return redirect()->back()->with('error', 'Username & Email Tidak Cocok');
    }
}
