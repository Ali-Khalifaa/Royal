<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('dashboard.galleries.index',compact('galleries'));
    }

    public function create()
    {
        $galleries = Gallery::all();
        return view('dashboard.galleries.create',compact('galleries'));
    }

    public function store(Request $request, Gallery $gallery)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            // $rules += [$locale . '.title_one' => ['required',Rule::unique('aboutsetting_translations','title_one')]];
            // $rules += [$locale . '.title_two' => ['required',Rule::unique('aboutsetting_translations','title_two')]];
            // $rules += [$locale . '.title_three' => ['required',Rule::unique('aboutsetting_translations','title_three')]];
            // $rules += [$locale . '.desc' => ['required',Rule::unique('aboutsetting_translations','desc')]];
        }

        $request->validate($rules);

        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize( null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/galleries/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $gallery::create($request_data);

        return redirect()->route('dashboard.gallery.index');
    }

    public function edit(Gallery $gallery)
    {
        return view('dashboard.galleries.edit',compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

           
            // $rules += [$locale . '.title_one' => ['required',Rule::unique('aboutsetting_translations','title_one')->ignore($aboutsetting->id,'aboutsetting_id')]];
            // $rules += [$locale . '.title_two' => ['required',Rule::unique('aboutsetting_translations','title_two')->ignore($aboutsetting->id,'aboutsetting_id')]];
            // $rules += [$locale . '.title_three' => ['required',Rule::unique('aboutsetting_translations','title_three')->ignore($aboutsetting->id,'aboutsetting_id')]];
            // $rules += [$locale . '.desc' => ['required',Rule::unique('aboutsetting_translations','desc')->ignore($aboutsetting->id,'aboutsetting_id')]];
        }

        $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {

            if ($gallery->img != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/galleries/' . $gallery->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/galleries/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $gallery->update($request_data);

        return redirect()->route('dashboard.gallery.index');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->img != 'default.png') {
                
            Storage::disk('public_uploads')->delete('/galleries/' . $gallery->img);

        } // end of inner if
        $gallery->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.gallery.index');
    }
}
