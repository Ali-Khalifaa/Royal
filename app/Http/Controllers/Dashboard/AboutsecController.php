<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Aboutsec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AboutsecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutsecs = Aboutsec::all();
        return view('dashboard.aboutsecs.index',compact('aboutsecs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aboutsecs = Aboutsec::all();
        return view('dashboard.aboutsecs.create',compact('aboutsecs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Aboutsec $aboutsec)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

        //     $rules += [$locale . '.title' => ['required',Rule::unique('aboutsec_translations','title')]];
         
        // }

        // $request->validate($rules);
        $request_data=$request->all();
        $aboutsec->create($request_data);

        return redirect()->route('dashboard.aboutsec.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aboutsec  $aboutsec
     * @return \Illuminate\Http\Response
     */
    public function edit(Aboutsec $aboutsec)
    {
        return view('dashboard.aboutsecs.edit',compact('aboutsec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutsec  $aboutsec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aboutsec $aboutsec)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

        //     $rules += [$locale . '.title' => ['required',Rule::unique('aboutsec_translations','title')->ignore($aboutsec->id,'aboutsec_id')]];

        // }

        // $request->validate($rules);
        $request_data=$request->all();
        $aboutsec->update($request_data);

        return redirect()->route('dashboard.aboutsec.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aboutsec  $aboutsec
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aboutsec $aboutsec)
    {
        $aboutsec->delete();
        return \redirect()->route('dashboard.aboutsec.index');
    }
}
