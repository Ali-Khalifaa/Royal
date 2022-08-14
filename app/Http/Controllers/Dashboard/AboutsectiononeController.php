<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Aboutsectionone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;


class AboutsectiononeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutsectionones = Aboutsectionone::all();
        return view('dashboard.aboutsectionones.index',compact('aboutsectionones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aboutsectionones = Aboutsectionone::all();
        return view('dashboard.aboutsectionones.create',compact('aboutsectionones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Aboutsectionone $aboutsectionone)
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
                ->save(public_path('uploads/about/one/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $aboutsectionone::create($request_data);

        return redirect()->route('dashboard.aboutsectionone.index');
    }

    public function edit(Aboutsectionone $aboutsectionone)
    {
        return view('dashboard.aboutsectionones.edit',compact('aboutsectionone'));
    }

    public function update(Request $request, Aboutsectionone $aboutsectionone)
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

            if ($aboutsectionone->img != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/about/one/' . $aboutsectionone->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/about/one/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $aboutsectionone->update($request_data);

        return redirect()->route('dashboard.aboutsectionone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aboutsetting  $aboutsetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aboutsectionone $aboutsectionone)
    {
        if ($aboutsectionone->img != 'default.png') {
                
            Storage::disk('public_uploads')->delete('/about/one/' . $aboutsectionone->img);

        } // end of inner if
        $aboutsectionone->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.aboutsetting.index');
    }
}
