<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Featured;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;


class FeaturedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featureds=Featured::all();
        return view('dashboard.featureds.index',compact('featureds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $featureds=Featured::all();
        return view('dashboard.featureds.create',compact('featureds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Featured $featured)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.address' => ['required',Rule::unique('featured_translations','address')]];
        }
        $rules += [
            'price' => 'required|max:100',
            'bedroom' => 'required',
            'bathroom' => 'required',
            'space' => 'required',
        ];

        $request->validate($rules);

        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize( null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/featured/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $featured::create($request_data);

        return redirect()->route('dashboard.featured.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function edit(Featured $featured)
    {
        return view('dashboard.featureds.edit',compact('featured'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Featured $featured)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

           
            $rules += [$locale . '.address' => ['required',Rule::unique('featured_translations','address')->ignore($featured->id,'featured_id')]];
        }
        $rules += [
            'price' => 'required|max:100',
            'bedroom' => 'required',
            'bathroom' => 'required',
            'space' => 'required',
        ];

        $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {

            if ($featured->img != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/featured/' . $featured->img);

            } // end of inner if

            Image::make($request->img)
                ->resize(null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/featured/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $featured->update($request_data);

        return redirect()->route('dashboard.featured.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function destroy(Featured $featured)
    {
        if ($featured->img != 'default.png') {
                
            Storage::disk('public_uploads')->delete('/featured/' . $featured->img);

        } // end of inner if
        $featured->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.featured.index');
    }
}
