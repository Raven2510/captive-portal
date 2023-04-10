<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    //Login Controller
    public function login() {
        if(auth()->check()){
            return redirect('/');
        }
        return view('login');
    }

    //Authenticate the login form
    public function auth(Request $request) {
        $credentials = $request->validate( [
            'email' => ['required', 'email', 'regex:/([a-z0-9]+[_a-z0-9\.-]*[a-z0-9]+)@((teacher|student)+\.laverdad\.edu\.ph)/i'],
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()]
        ]);

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();

            $user = User::find(auth()->id());
            $user->is_active = true;
            $user->save();

            return redirect()->intended();
        }

        return back();
    }

    //Logout Controller
    public function logout(Request $request) {
        $user = User::find(auth()->id());
        $user->is_active = false;
        $user->save();

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

    //Sample Home Page
    public function home() {
        return view('welcome');
    }
}
