<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Homespecialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;


class HomespecialistController extends Controller
{
    public function index()
    {
        $homespecialists = Homespecialist::all();
        return view('dashboard.homespecialists.index',compact('homespecialists'));
    }

    public function create()
    {
        $homespecialists = Homespecialist::all();
        return view('dashboard.homespecialists.create',compact('homespecialists'));
    }

    public function store(Request $request, Homespecialist $homespecialist)
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
                ->save(public_path('uploads/home/doctors/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $homespecialist::create($request_data);

        return redirect()->route('dashboard.homespecialist.index');
    }

    public function edit(Homespecialist $homespecialist)
    {
        return view('dashboard.homespecialists.edit',compact('homespecialist'));
    }

    public function update(Request $request, Homespecialist $homespecialist)
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

            if ($homespecialist->img != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/home/doctors/' . $homespecialist->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/home/doctors/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $homespecialist->update($request_data);

        return redirect()->route('dashboard.homespecialist.index');
    }

    public function destroy(Homespecialist $homespecialist)
    {
        if ($homespecialist->img != 'default.png') {
                
            Storage::disk('public_uploads')->delete('/home/doctors/' . $homespecialist->img);

        } // end of inner if
        $homespecialist->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.homespecialist.index');
    }
}
