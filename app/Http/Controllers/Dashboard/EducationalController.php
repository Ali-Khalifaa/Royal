<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Educational;
use App\Models\EducationalImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use File;

class EducationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educationals=Educational::all();
        return view('dashboard.educationals.index',compact('educationals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educationals=Educational::all();
        return view('dashboard.educationals.create',compact('educationals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $rules=[];
//
//        foreach(config('translatable.locales') as $locale){
//
//            $rules += [$locale . '.title' => ['required',Rule::unique('educational_translations','title')]];
//        }
//
//        $request->validate($rules);

        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/educational/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $educational=Educational::create($request_data);

        $id=$educational->id;

        $i =0;


        if($images = $request->file('images')){
            foreach($request->file('images') as $images){


                $destinationPath =public_path().'/uploads/educational/images/';
                $extension = $images->getClientOriginalExtension();
                $fileName = $id.'image'. $i . '.'.$extension;
                $images->move($destinationPath, $fileName);

                $imags =array([
                    'educational_id' =>  $id,
                    'img' => $fileName,
                ]);

                EducationalImages::insert($imags);
                $i++;
                // $image_count=Imagepainting::where('painting_id',$id)->count();

            }
        }


        return redirect()->route('dashboard.educational.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Educational  $educational
     * @return \Illuminate\Http\Response
     */
    public function edit(Educational $educational)
    {
        return view('dashboard.educationals.edit',compact('educational'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Educational  $educational
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Educational $educational)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){


            $rules += [$locale . '.title' => ['required',Rule::unique('educational_translations','title')->ignore($educational->id,'educational_id')]];
        }

        $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {

            if ($educational->img != 'default.png') {

                Storage::disk('public_uploads')->delete('/educational/' . $educational->img);

            } // end of inner if

            Image::make($request->img)
                ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/educational/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $educational->update($request_data);

        return redirect()->route('dashboard.educational.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Educational  $educational
     * @return \Illuminate\Http\Response
     */
    public function destroy(Educational $educational)
    {
        if ($educational->img != 'default.png') {

            Storage::disk('public_uploads')->delete('/educational/' . $educational->img);

        } // end of inner if

        $id=$educational->id;

        $img=EducationalImages::find($id);

        $paintings = $educational::findOrFail($id);

        $destinationPath = public_path('/uploads/educational/images/').$paintings->img;

        if(File::exists($destinationPath)){
            File::delete($destinationPath);
        }

        $images = EducationalImages::where('educational_id',$id)->get();
        foreach($images as $image){

            $path = public_path('/uploads/educational/images/').$image->img;
            if(File::exists($path)){
                File::delete($path);
            }
        }


        $educational->delete();

        return \redirect()->route('dashboard.educational.index');
    }
}
