<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the active users.
     */
    public function index()
    {
        if(!Gate::allows('isAdmin')){
            return abort(403);
        }

        //connected users
        $active_users = User::where('is_active', true)->get();

        return view('admin', [
            'connected_users' => $active_users
        ]);
    }

    /**
     * Promote specified user.
     */
    public function promoteRole(User $user)
    {
        if(!Gate::allows('isAdmin')){
            return abort(403);
        }

        $user->role = $user->role == 'user' ? 'admin': 'user';
        $user->save();
        
        return redirect('/users/{'.$user->id.'}');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        if(Gate::allows('isAdmin') || Gate::allows('isOwner', $user)){
            $user->delete();

            return redirect('/admin');
        }

        return abort(403);
    }
}
