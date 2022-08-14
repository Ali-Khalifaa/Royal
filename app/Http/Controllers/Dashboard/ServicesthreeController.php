<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Sevicesthree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

class ServicesthreeController extends Controller
{
    public function index()
    {
        $sevicesthrees = Sevicesthree::all();
        return view('dashboard.sevicesthrees.index',compact('sevicesthrees'));
    }

    public function create()
    {
        $sevicesthrees = Sevicesthree::all();
        return view('dashboard.sevicesthrees.create',compact('sevicesthrees'));
    }

    public function store(Request $request, Sevicesthree $sevicesthree)
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
                ->save(public_path('uploads/services/two/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        if($request->hasFile('pdf')){

            $img = $request->file('pdf');
            $ext = $img->getClientOriginalExtension();
            $name = "pdf-". uniqid() . ".$ext";
            $img->move( public_path('uploads/services/pdf/') , $name);
            $request_data['pdf'] = $name;
        }

        $sevicesthree::create($request_data);

        return redirect()->route('dashboard.sevicesthree.index');
    }

    public function edit(Sevicesthree $sevicesthree)
    {
        return view('dashboard.sevicesthrees.edit',compact('sevicesthree'));
    }

    public function update(Request $request, Sevicesthree $sevicesthree)
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

            if ($sevicesthree->img != 'default.png') {

                Storage::disk('public_uploads')->delete('/services/two/' . $sevicesthree->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/services/two/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        if($request->hasFile('pdf')){

            $img = $request->file('pdf');
            $ext = $img->getClientOriginalExtension();
            $name = "pdf-". uniqid() . ".$ext";

            $img->move( public_path('uploads/services/pdf/') , $name);

            $request_data['pdf']=$name;
        }

        $sevicesthree->update($request_data);

        return redirect()->route('dashboard.sevicesthree.index');
    }

    public function destroy(Sevicesthree $sevicesthree)
    {
        if ($sevicesthree->img != 'default.png') {

            Storage::disk('public_uploads')->delete('/services/two/' . $sevicesthree->img);

        } // end of inner if
        $sevicesthree->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.sevicesthree.index');
    }
}
