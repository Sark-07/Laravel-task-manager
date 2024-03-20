<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public static function create()
    {

        if (!auth()->check()) {

            return view('admin.auth.register');
        }
        return redirect('/admin/dashboard');
    }


    public static function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:4', 'confirmed'],
            'password_confirmation' => ['required', 'min:4']
        ]);

        $validateData['type'] = 1;
        User::create($validateData);
        return redirect('/admin/login')->with('success', 'Admin registered');
    }


    public static function view()
    {

        if (!auth()->check()) {

            return view('admin.auth.login');
        } elseif (auth()->check() && auth()->user()->type != 1) {
            return redirect('/user/login');
        }
        return redirect('/admin/dashboard');
    }


    public static function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required', 'min:4']
        ]);

        $user = User::where('email', $validateData['email'])->first();
        if ($user && $user->type == 1) {
            if (Auth::attempt($validateData, $request->has('remember'))) {
                $request->session()->regenerate();
                return redirect('/admin/dashboard');
            }
        }

        return redirect()->back()->with('failed-auth', 'Invalid email or password.');
    }


    public static function logout(Request $request)
    {

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
}
