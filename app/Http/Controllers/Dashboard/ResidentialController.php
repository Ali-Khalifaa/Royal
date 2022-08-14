<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Residential;
use App\Models\ResidentialImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use File;


class ResidentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residentials=Residential::all();
        return view('dashboard.residentials.index',compact('residentials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residential=Residential::all();
        return view('dashboard.residentials.create',compact('residential'));
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

//        foreach(config('translatable.locales') as $locale){
//
//            $rules += [$locale . '.title' => ['required',Rule::unique('residential_translations','title')]];
//            $rules += [$locale . '.desc' => ['required',Rule::unique('residential_translations','desc')]];
//            $rules += [$locale . '.big_desc' => ['required',Rule::unique('residential_translations','big_desc')]];
//            $rules += [$locale . '.address' => ['required',Rule::unique('residential_translations','address')]];
//            $rules += [$locale . '.type' => ['required',Rule::unique('residential_translations','type')]];
//        }
//        $rules += [
////            'allroom' => 'required|max:100',
////            'bedroom' => 'required|max:100',
////            'kitchen' => 'required|max:100',
////            'livingroom' => 'required|max:100',
////            'year' => 'required|max:100',
////            'area' => 'required|max:100',
////            'location' => 'required',
////            'plans' => 'required',
//        ];
//
//        $request->validate($rules);

        $request_data=$request->all();

        if ($request->plans) {
            Image::make($request->plans)
                ->resize( null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/residential/plan/' . $request->plans->hashName()));
            $request_data['plans']=$request->plans->hashName();
        }

        if ($request->img) {
            Image::make($request->img)
                ->resize( null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/residential/title/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }


        $residential=Residential::create($request_data);
        $id=$residential->id;

        //img


        $i =0;


        if($images = $request->file('images')){
            foreach($request->file('images') as $images){


                    $destinationPath =public_path().'/uploads/residential/images/';
                    $extension = $images->getClientOriginalExtension();
                    $fileName = $id.'image'. $i . '.'.$extension;
                    $images->move($destinationPath, $fileName);

                    $imags =array([
                        'residential_id' =>  $id,
                        'img' => $fileName,
                    ]);

                    ResidentialImages::insert($imags);
                    $i++;
                    // $image_count=Imagepainting::where('painting_id',$id)->count();

            }
        }
        return redirect()->route('dashboard.residential.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Residential  $residential
     * @return \Illuminate\Http\Response
     */
    public function edit(Residential $residential)
    {
        return view('dashboard.residentials.edit',compact('residential'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Residential  $residential
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Residential $residential)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){
        //     $rules += [$locale . '.title' => ['required',Rule::unique('residential_translations','title')->ignore($residential->id,'residential_id')]];
        //     $rules += [$locale . '.desc' => ['required',Rule::unique('residential_translations','desc')->ignore($residential->id,'residential_id')]];
        //     $rules += [$locale . '.big_desc' => ['required',Rule::unique('residential_translations','big_desc')->ignore($residential->id,'residential_id')]];
        //     $rules += [$locale . '.address' => ['required',Rule::unique('residential_translations','address')->ignore($residential->id,'residential_id')]];
        //     $rules += [$locale . '.type' => ['required',Rule::unique('residential_translations','type')->ignore($residential->id,'residential_id')]];
        // }

        // $rules += [
        //     'allroom' => 'required|max:100',
        //     'bedroom' => 'required|email|max:100',
        //     'kitchen' => 'required|max:100',
        //     'livingroom' => 'required|email|max:100',
        //     'year' => 'required|max:100',
        //     'area' => 'required|email|max:100',
        //     'bedrooms' => 'required|email|max:100',
        //     'location' => 'required|email|max:100',
        //     'plans' => 'required|email|max:100',
        // ];

        // $request->validate($rules);
        $request_data=$request->all();

        if ($request->plans) {

            if ($residential->plans != 'default.png') {

                Storage::disk('public_uploads')->delete('/residential/plan/' . $residential->plans);

            } // end of inner if

            Image::make($request->plans)
                ->resize( null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/residential/plan/' . $request->plans->hashName()));
            $request_data['plans']=$request->plans->hashName();
        }

        if ($request->img) {

            if ($residential->img != 'default.png') {

                Storage::disk('public_uploads')->delete('/residential/title/' . $residential->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/residential/title/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $residential->update($request_data);

        return redirect()->route('dashboard.residential.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Residential  $residential
     * @return \Illuminate\Http\Response
     */
    public function destroy(Residential $residential)
    {
        if ($residential->img != 'default.png') {

            Storage::disk('public_uploads')->delete('/residential/title/' . $residential->img);

        } // end of inner if
        if ($residential->plans != 'default.png') {

            Storage::disk('public_uploads')->delete('/residential/plan/' . $residential->plans);

        } // end of inner if
        $id=$residential->id;

        $img=ResidentialImages::find($id);

        $paintings = $residential::findOrFail($id);

        $destinationPath = public_path('/uploads/residential/images/').$paintings->img;

        if(File::exists($destinationPath)){
            File::delete($destinationPath);
        }

        $images = ResidentialImages::where('residential_id',$id)->get();
        foreach($images as $image){

            $path = public_path('/uploads/residential/images/').$image->img;
            if(File::exists($path)){
                File::delete($path);
            }
        }

        $residential->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.residential.index');



    }
}
