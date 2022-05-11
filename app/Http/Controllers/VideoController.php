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
            'videoName' => 'required|file|required|mimes:pdf,mp4'
        ]);

        // return $request->all();

        if ($request->hasFile('videoName')) {
            $filenameWithExt = $request->file('videoName')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('videoName')->getClientOriginalExtension();
            $fileNameToStore = uniqid() . '_' . time() . '.' . $extension;
            $request->file('videoName')->move(public_path() . '/videos/', $filenameWithExt);
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
