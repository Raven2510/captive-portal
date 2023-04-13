<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

class AuthenticationController extends Controller
{
    //Login Controller
    public function login() {
        if(Gate::allows('isLoggedIn')){
            return redirect()->intended();
        }

        return view('login');
    }

    //Authenticate the login form
    public function auth(UserLoginRequest $request) {
        $credentials = $request->validated();

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();

            $user = User::find(auth()->id());
            $user->is_active = true;
            $user->save();

            return redirect()->intended();
        }

        return back()->withErrors([
            'error' => 'Invalid email or password.'
        ]);
    }

    //Logout Controller
    public function logout(Request $request) {
        if(!Gate::allows('isLoggedIn')){
            redirect('/login');
        }

        $user = User::find(auth()->id());
        $user->is_active = false;
        $user->save();

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function signup(){
        if(Gate::allows('isLoggedIn')){
            return redirect()->intended();
        }

        return view('signup');
    }

    //Register new user
    public function register(UserRegisterRequest $request){
        $credentials = $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
            
        if(auth()->attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'] 
        ])){
            $request->session()->regenerate(); 

            $user->is_active = true;
            $user->save();

            return redirect('/');
        }
        
        return back();
    }
}
