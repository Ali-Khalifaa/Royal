<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Clientsay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

class ClientsayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientsays=Clientsay::all();
        return view('dashboard.clientsays.index',compact('clientsays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientsay=Clientsay::all();
        return view('dashboard.clientsays.create',compact('clientsay'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Clientsay $clientsay)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            // $rules += [$locale . '.name' => ['required',Rule::unique('clientsay_translations','name')]];
            // $rules += [$locale . '.desc' => ['required',Rule::unique('clientsay_translations','desc')]];
        }

        $request->validate($rules);

        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/home/clientsay/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $clientsay::create($request_data);

        return redirect()->route('dashboard.clientsay.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientsay  $clientsay
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientsay $clientsay)
    {
        return view('dashboard.clientsays.edit',compact('clientsay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientsay  $clientsay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientsay $clientsay)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

           
            // $rules += [$locale . '.name' => ['required',Rule::unique('clientsay_translations','name')->ignore($clientsay->id,'clientsay_id')]];
            // $rules += [$locale . '.desc' => ['required',Rule::unique('clientsay_translations','desc')->ignore($clientsay->id,'clientsay_id')]];

        }

        $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {

            if ($clientsay->img != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/home/clientsay/' . $clientsay->img);

            } // end of inner if

            Image::make($request->img)
                ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/home/clientsay/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $clientsay->update($request_data);

        return redirect()->route('dashboard.clientsay.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientsay  $clientsay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientsay $clientsay)
    {
        if ($clientsay->img != 'default.png') {
                
            Storage::disk('public_uploads')->delete('/home/clientsay/' . $clientsay->img);

        } // end of inner if
        $clientsay->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.clientsay.index');
    }
}
