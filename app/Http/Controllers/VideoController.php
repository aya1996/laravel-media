<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function create()
    {
        return view('addVideo');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|string|max:255',
            'videoName' => 'required|file|mimetypes:video/mp4,pdf',
        ]);



        if ($request->hasFile('videoName')) {
            $filenameWithExt = $request->file('videoName')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('videoName')->getClientOriginalExtension();
            $fileNameToStore = uniqid() . '_' . time() . '.' . $extension;
            $path = $request->file('videoName')->storeAs('public/videos/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $NewVideo = new Video();
        $NewVideo->title = $request->title;
        $NewVideo->video = $fileNameToStore;
        $NewVideo->save();
        return back()->with('success', 'Your video has been successfully');
    }
}
