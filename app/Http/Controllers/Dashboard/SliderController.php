<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = Slider::all();
        return view('dashboard.sliders.create',compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Slider $slider)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            // $rules += [$locale . '.desc_one' => ['required',Rule::unique('job_translations','desc_one')]];
            // $rules += [$locale . '.desc_two' => ['required',Rule::unique('job_translations','desc_two')]];
            // $rules += [$locale . '.desc_three' => ['required',Rule::unique('job_translations','desc_three')]];

        }
        $rules += [
            // 'phone' => 'required|max:100',
            // 'email' => 'required|email|max:100',
        ];
        $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize( null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/home/slider/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }


        $slider->create($request_data);

        return redirect()->route('dashboard.slider.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {

        $rules=[];

        foreach(config('translatable.locales') as $locale){

            // $rules += [$locale . '.desc_one' => ['required',Rule::unique('job_translations','desc_one')->ignore($job->id,'job_id')]];
            // $rules += [$locale . '.desc_two' => ['required',Rule::unique('job_translations','desc_two')->ignore($job->id,'job_id')]];
            // $rules += [$locale . '.desc_three' => ['required',Rule::unique('job_translations','desc_three')->ignore($job->id,'job_id')]];

        }
        $rules += [
            // 'phone' => 'required|max:100',
            // 'email' => 'required|email|max:100',
        ];

        $request->validate($rules);
        $request_data=$request->all();

        if($request->hasFile('img')){
            $old_name =  $slider->pdf;
            if($old_name)
            {
                unlink( public_path('uploads/home/slider/') . $old_name );
            }

            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "img-". uniqid() . ".$ext";

            $img->move( public_path('uploads/home/slider/') , $name);
            $request_data['img']=$name;

        }

        $slider->update($request_data);

        return redirect()->route('dashboard.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return \redirect()->route('dashboard.slider.index');
    }
}
