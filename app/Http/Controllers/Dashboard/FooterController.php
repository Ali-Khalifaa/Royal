<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Footer::all();
        return view('dashboard.footer.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = Footer::all();
        return view('dashboard.footer.create',compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Footer $footer)
    {
        if ($request->img) {

            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "img-". uniqid() . ".$ext";

            $img->move( public_path('uploads/footer/') , $name);
            $request_data['img']=$name;
        }

        $footer->create($request_data);

        return redirect()->route('dashboard.footer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Footer::find($id);
        return view('dashboard.footer.edit',compact('slider'));
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
        $slider =Footer::find($id);
        $request_data=$request->all();

        if($request->hasFile('img')){
            $old_name =  $slider->pdf;
            if($old_name)
            {
                unlink( public_path('uploads/footer/') . $old_name );
            }

            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "img-". uniqid() . ".$ext";

            $img->move( public_path('uploads/footer/') , $name);
            $request_data['img']=$name;

        }

        $slider->update($request_data);

        return redirect()->route('dashboard.footer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChoseSlider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Footer::find($id);
        $slider->delete();
        return \redirect()->route('dashboard.footer.index');
    }
}
