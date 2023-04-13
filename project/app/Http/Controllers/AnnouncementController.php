<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $announcements = Announcement::all();

        return view('announcement', [
            'arr' => $announcements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Gate::allows('isAdmin')){
            return abort(403);
        }
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnouncementRequest $request)
    {
        if(!Gate::allows('isAdmin')){
            return abort(403);
        }

        $credentials = $request->validated();

        $announcement = Announcement::create([
            'user_id' => auth()->user(),
            'caption' => $credentials['caption'],
            'image_path' => $credentials['image_path']
        ]);

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        if(!Gate::allows('isAdmin')){
            return abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        if(!Gate::allows('isAdmin')){
            return abort(403);
        }
        
        $credentials = $request->validated();

        $announcement->caption = $credentials['caption'];
        $announcement->img_path = $credentials['img_path'];
        $announcement->save();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        if(!Gate::allows('isAdmin')){
            return abort(403);
        }

        $announcement->delete();
    }
}
