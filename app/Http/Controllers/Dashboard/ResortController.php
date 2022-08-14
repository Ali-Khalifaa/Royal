<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Resort;
use App\Models\ResortImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use File;

class ResortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resorts=Resort::all();
        return view('dashboard.resorts.index',compact('resorts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resorts=Resort::all();
        return view('dashboard.resorts.create',compact('resorts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.title' => ['required',Rule::unique('resort_translations','title')]];

        }

        $request->validate($rules);

        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize( null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/resort/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $resort=Resort::create($request_data);

        $id=$resort->id;

        $i =0;


        if($images = $request->file('images')){
            foreach($request->file('images') as $images){


                $destinationPath =public_path().'/uploads/resort/images/';
                $extension = $images->getClientOriginalExtension();
                $fileName = $id.'image'. $i . '.'.$extension;
                $images->move($destinationPath, $fileName);

                $imags =array([
                    'resort_id' =>  $id,
                    'img' => $fileName,
                ]);

                ResortImages::insert($imags);
                $i++;
                // $image_count=Imagepainting::where('painting_id',$id)->count();

            }
        }

        return redirect()->route('dashboard.resort.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resort  $resort
     * @return \Illuminate\Http\Response
     */
    public function edit(Resort $resort)
    {
        return view('dashboard.resorts.edit',compact('resort'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resort  $resort
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resort $resort)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){


            $rules += [$locale . '.title' => ['required',Rule::unique('resort_translations','title')->ignore($resort->id,'resort_id')]];
        }

        $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {

            if ($resort->img != 'default.png') {

                Storage::disk('public_uploads')->delete('/resort/' . $resort->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/resort/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $resort->update($request_data);

        return redirect()->route('dashboard.resort.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resort  $resort
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resort $resort)
    {
        if ($resort->img != 'default.png') {

            Storage::disk('public_uploads')->delete('/resort/' . $resort->img);

        } // end of inner if


        $id=$resort->id;

        $img=ResortImages::find($id);

        $paintings = $resort::findOrFail($id);

        $destinationPath = public_path('/uploads/resort/images/').$paintings->img;

        if(File::exists($destinationPath)){
            File::delete($destinationPath);
        }

        $images = ResortImages::where('resort_id',$id)->get();
        foreach($images as $image){

            $path = public_path('/uploads/resort/images/').$image->img;
            if(File::exists($path)){
                File::delete($path);
            }
        }

        $resort->delete();
        return \redirect()->route('dashboard.resort.index');
    }
}
