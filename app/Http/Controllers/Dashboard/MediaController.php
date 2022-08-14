<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias=Media::all();
        return view('dashboard.medias.index',compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medias=Media::all();
        return view('dashboard.medias.create',compact('medias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Media $media)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.title' => ['required',Rule::unique('media_translations','title')]];
        }

        $request->validate($rules);

        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize( null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/media/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $media::create($request_data);

        return redirect()->route('dashboard.media.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        return view('dashboard.medias.edit',compact('media'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

           
            $rules += [$locale . '.title' => ['required',Rule::unique('media_translations','title')->ignore($media->id,'media_id')]];
        }

        $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {

            if ($media->img != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/media/' . $media->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/media/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $media->update($request_data);

        return redirect()->route('dashboard.media.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        if ($media->img != 'default.png') {
                
            Storage::disk('public_uploads')->delete('/media/' . $media->img);

        } // end of inner if
        $media->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.media.index');
    }
}
