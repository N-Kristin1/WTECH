<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|confirmed',
            'address'    => 'required',
            'phone'      => 'required',
        ]);

    User::create([
        'first_name' => $request->first_name,
        'last_name'  => $request->last_name,
        'name'       => $request->first_name . ' ' . $request->last_name,
        'email'      => $request->email,
        'password'   => Hash::make($request->password),
        'address'    => $request->address,
        'phone'      => $request->phone,
    ]);

        return redirect('/')->with('success', 'Registration successful. You can now log in.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect(Auth::user()->admin ? '/admin' : '/');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

}

