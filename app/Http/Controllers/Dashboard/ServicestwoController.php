<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Sevicestwo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;


class ServicestwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sevicestwos = Sevicestwo::all();
        return view('dashboard.sevicestwos.index',compact('sevicestwos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sevicestwos = Sevicestwo::all();
        return view('dashboard.sevicestwos.create',compact('sevicestwos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sevicestwo $sevicestwo)
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
                ->save(public_path('uploads/services/one/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $sevicestwo::create($request_data);

        return redirect()->route('dashboard.sevicestwo.index');
    }

    public function edit(Sevicestwo $sevicestwo)
    {
        return view('dashboard.sevicestwos.edit',compact('sevicestwo'));
    }

    public function update(Request $request, Sevicestwo $sevicestwo)
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

            if ($sevicestwo->img != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/services/one/' . $sevicestwo->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/services/one/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $sevicestwo->update($request_data);

        return redirect()->route('dashboard.sevicestwo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aboutsetting  $aboutsetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sevicestwo $sevicestwo)
    {
        if ($sevicestwo->img != 'default.png') {
                
            Storage::disk('public_uploads')->delete('/services/one/' . $sevicestwo->img);

        } // end of inner if
        $sevicestwo->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.aboutsetting.index');
    }
}
