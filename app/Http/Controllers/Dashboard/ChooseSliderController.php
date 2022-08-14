<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ChoseSlider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class ChooseSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = ChoseSlider::all();
        return view('dashboard.chose_sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = ChoseSlider::all();
        return view('dashboard.chose_sliders.create',compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ChoseSlider $slider)
    {
        if ($request->img) {

            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "img-". uniqid() . ".$ext";

            $img->move( public_path('uploads/home/chose_slider/') , $name);
            $request_data['img']=$name;
        }

        $slider->create($request_data);

        return redirect()->route('dashboard.choseSlider.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = ChoseSlider::find($id);
        return view('dashboard.chose_sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider =ChoseSlider::find($id);
        $request_data=$request->all();

        if($request->hasFile('img')){
            $old_name =  $slider->pdf;
            if($old_name)
            {
                unlink( public_path('uploads/home/chose_slider/') . $old_name );
            }

            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "img-". uniqid() . ".$ext";

            $img->move( public_path('uploads/home/chose_slider/') , $name);
            $request_data['img']=$name;

        }

        $slider->update($request_data);

        return redirect()->route('dashboard.choseSlider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChoseSlider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = ChoseSlider::find($id);
        $slider->delete();
        return \redirect()->route('dashboard.choseSlider.index');
    }
}
