<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Moreinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

class MoreinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moreinfos=Moreinfo::all();
        return view('dashboard.moreinfos.index',compact('moreinfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moreinfos=Moreinfo::all();
        return view('dashboard.moreinfos.create',compact('moreinfos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Moreinfo $moreinfo)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.title' => ['required',Rule::unique('moreinfo_translations','title')]];
            $rules += [$locale . '.desc' => ['required',Rule::unique('moreinfo_translations','desc')]];
        }

        $request->validate($rules);

        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize( null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/about/moreinfo/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $moreinfo::create($request_data);

        return redirect()->route('dashboard.moreinfo.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moreinfo  $moreinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Moreinfo $moreinfo)
    {
        return view('dashboard.moreinfos.edit',compact('moreinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moreinfo  $moreinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moreinfo $moreinfo)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

           
            $rules += [$locale . '.title' => ['required',Rule::unique('moreinfo_translations','title')->ignore($moreinfo->id,'moreinfo_id')]];
            $rules += [$locale . '.desc' => ['required',Rule::unique('moreinfo_translations','desc')->ignore($moreinfo->id,'moreinfo_id')]];
        }

        $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {

            if ($moreinfo->img != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/about/moreinfo/' . $moreinfo->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/about/moreinfo/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $moreinfo->update($request_data);

        return redirect()->route('dashboard.moreinfo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moreinfo  $moreinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moreinfo $moreinfo)
    {
        if ($moreinfo->img != 'default.png') {
                
            Storage::disk('public_uploads')->delete('/about/moreinfo/' . $moreinfo->img);

        } // end of inner if
        $moreinfo->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.moreinfo.index');
    }
}
