<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('signin');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, redirect ke homepage
            return redirect()->intended('/homepage');
        } else {
            // Login gagal, redirect kembali dengan error
            return redirect()->route('signin')->withErrors([
                'signin' => 'Username atau password salah',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('signin');
    }

    public function showSignUpForm()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|string',
            'name' => 'nullable|string|max:255',
        ]);

        // Create new user
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash password
        $user->role = $request->role;
        // $user->name = $request->name ?? 'Anonymous';
        $user->save();

        // Create Profile Users
        $profile = new Profile();
        $profile->id_user = $user->id;
        $profile->nama = $request->name;
        $profile->Jenis_Kelamin = '-';
        $profile->save();

        // Redirect or respond after successful registration
        return redirect()->route('signin')->with('success', 'Account created successfully!');
    }
    
    public function dashboard()
    {
        // Add logic here for the dashboard view, or redirect if needed
        return view('dashboard'); // Ensure 'dashboard' view file exists
    }
}
