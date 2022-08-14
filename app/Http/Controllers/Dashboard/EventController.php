<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Partenar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

    public function index()
    {
        $partenars=Partenar::all();
        return view('dashboard.partenars.index',compact('partenars'));
    }

 
    public function create()
    {
        $partenars=Partenar::all();
        return view('dashboard.partenars.create',compact('partenars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Partenar $partenar)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            // $rules += [$locale . '.desc' => ['required',Rule::unique('event_translations','desc')]];
            // $rules += [$locale . '.title' => ['required',Rule::unique('event_translations','title')]];
        }

        $request->validate($rules);

        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize( null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/event/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $partenar::create($request_data);

        return redirect()->route('dashboard.partenar.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Partenar $partenar)
    {
        return view('dashboard.partenars.edit',compact('partenar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partenar $partenar)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

        }

        $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {

            if ($partenar->img != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/event/' . $partenar->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/event/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $partenar->update($request_data);

        return redirect()->route('dashboard.partenar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partenar $partenar)
    {
        if ($partenar->img != 'default.png') {
                
            Storage::disk('public_uploads')->delete('/event/' . $partenar->img);

        } // end of inner if
        $partenar->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.partenar.index');
    }
}
