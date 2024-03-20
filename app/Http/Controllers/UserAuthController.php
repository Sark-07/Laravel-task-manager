<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public static function create() {
        
        if (!auth()->check()) {

            return view('users.auth.register');
        }
        return redirect('/user/dashboard');
    }
    
    
    public static function store(Request $request) {
        
        $validateData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:4', 'confirmed'],
            'password_confirmation' => ['required', 'min:4']
        ]);
        
        User::create($validateData);  
        return redirect('/user/login')->with('success', 'User registered');
    }


    public static function view() {
        
        if (!auth()->check()) {
            return view('users.auth.login');
        }else if (auth()->check() && auth()->user()->type == 1) {
            // dd('hi');
            return redirect('/admin/login');
        }
        return redirect('/user/dashboard');
    }


    public static function login(Request $request)
{
    $validateData = $request->validate([
        'email' => ['required', 'email', Rule::exists('users', 'email')],
        'password' => ['required', 'min:4']
    ]);

    $user = User::where('email', $validateData['email'])->first();

    if ($user && $user->type !== 1) {
        if (Auth::attempt($validateData, $request->has('remember'))) {
            $request->session()->regenerate();

            return redirect('/user/dashboard');
        } 
    }

    return redirect()->back()->with('failed-auth', 'Invalid email or password.');
}


    public static function logout(Request $request) {
      
      
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }


}
