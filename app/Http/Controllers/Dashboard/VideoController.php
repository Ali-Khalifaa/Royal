<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class VideoController extends Controller
{
    
    public function index()
    {
        $videos = Video::all();
        return view('dashboard.videos.index',compact('videos'));
    }

    public function create()
    {
        $videos = Video::all();
        return view('dashboard.videos.create',compact('videos'));
    }

    public function store(Request $request,Video $video)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

        //     // $rules += [$locale . '.desc' => ['required',Rule::unique('word_translations','desc')]];

        // }

        // $request->validate($rules);

        $request_data=$request->all();
        $video->create($request_data);

        return redirect()->route('dashboard.video.index');
    }

    public function edit(Video $video)
    {
        return view('dashboard.videos.edit',compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

        //     $rules += [$locale . '.desc' => ['required',Rule::unique('word_translations','desc')->ignore($word->id,'word_id')]];

        // }

        // $request->validate($rules);
        $request_data=$request->all();
        $video->update($request_data);

        return redirect()->route('dashboard.video.index');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return \redirect()->route('dashboard.video.index');
    }
}
