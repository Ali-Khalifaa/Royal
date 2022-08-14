<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Aboutsetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

class AboutsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutsettings = Aboutsetting::all();
        return view('dashboard.aboutsettings.index',compact('aboutsettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aboutsettings = Aboutsetting::all();
        return view('dashboard.aboutsettings.create',compact('aboutsettings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Aboutsetting $aboutsetting)
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
                ->save(public_path('uploads/home/about/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $aboutsetting::create($request_data);

        return redirect()->route('dashboard.aboutsetting.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aboutsetting  $aboutsetting
     * @return \Illuminate\Http\Response
     */
    public function edit(Aboutsetting $aboutsetting)
    {
        return view('dashboard.aboutsettings.edit',compact('aboutsetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutsetting  $aboutsetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aboutsetting $aboutsetting)
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

            if ($aboutsetting->img != 'default.png') {

                Storage::disk('public_uploads')->delete('/home/about/' . $aboutsetting->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/home/about/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $aboutsetting->update($request_data);

        return redirect()->route('dashboard.aboutsetting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aboutsetting  $aboutsetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aboutsetting $aboutsetting)
    {
        if ($aboutsetting->img != 'default.png') {

            Storage::disk('public_uploads')->delete('/home/about/' . $aboutsetting->img);

        } // end of inner if
        $aboutsetting->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.aboutsetting.index');
    }
}
