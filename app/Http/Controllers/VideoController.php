<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use Illuminate\Support\Facades\Storage;

class VideoController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos= Video::all()->map(fn($video)=>[
            'id'=>$video->id,
            'title'=>$video->title,
            'video_path'=>$video->video_path ? Storage::url($video->video_path):null,
        ]);
        return inertia('AllowedPages/Video',['videos'=>$videos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('AllowedPages/Tools/CreateVideo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest $request)
    {
        $video_path = $request->has('video') ?$request->file('video')->store('public/videos'):null;
        Video::create([
            'title'=>$request->title,
            'video_path'=>$video_path,
        ]);
        return redirect()->route('videos.index')->with('created',"Video is successfully uploaded");
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }
}
