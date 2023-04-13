<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function admin() {
        return auth()->user()->role === 'admin';
    }

    public function user() {
        return auth()->user()->role === 'user'; 
    }

    public function authenticated(){
        return auth()->check();
    }

    public function owner(User $user){
        return auth()->user() === $user;
    }
}
