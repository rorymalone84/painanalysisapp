<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->user_role === 0){ 
                return redirect()->intended('/patients/home');
            }
            
            if(Auth::user()->user_role === 1){ 
                return redirect()->intended('/doctors/dashboard');
            }

            if(Auth::user()->user_role === 2){ 
                return redirect()->intended('/admin/dashboard');
            } 
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}