<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function admin(User $user) {
        return $user->role === 'admin';
    }

    public function user(User $user) {
        return $user->role === 'user'; 
    }

    public function authenticated(){
        return auth()->check();
    }
}
