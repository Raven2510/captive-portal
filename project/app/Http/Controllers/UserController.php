<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    

    //Sample Home Page
    public function home() {
        if(!Gate::allows('isUser')){
            return redirect('/admin');
        }


        return view('home');
    }

    /**
     * Display the specified user profile.
     */
    public function profile(User $user)
    {
        if(!Gate::allows('isLoggedIn')){
            return redirect('/');
        }

        return view('profile', [
            'user' => $user
        ]);
    }

    /**
     * Edit the specified user profile
     */
    public function edit(User $user){
        if(Gate::allows('isAdmin') || Gate::allows('isOwner', $user)){
            
        }

        return back();
    }
}
