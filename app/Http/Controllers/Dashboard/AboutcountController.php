<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Aboutcount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AboutcountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutcounts = Aboutcount::all();
        return view('dashboard.aboutcounts.index',compact('aboutcounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aboutcounts = Aboutcount::all();
        return view('dashboard.aboutcounts.create',compact('aboutcounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Aboutcount $aboutcount)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.name' => ['required',Rule::unique('aboutcount_translations','name')]];

        }
        $rules += [
            'count' => 'required|max:100',
        ];

        $request->validate($rules);
        $request_data=$request->all();
        $aboutcount->create($request_data);

        return redirect()->route('dashboard.aboutcount.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aboutcount  $aboutcount
     * @return \Illuminate\Http\Response
     */
    public function edit(Aboutcount $aboutcount)
    {
        return view('dashboard.aboutcounts.edit',compact('aboutcount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutcount  $aboutcount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aboutcount $aboutcount)
    {
        
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.name' => ['required',Rule::unique('aboutcount_translations','name')->ignore($aboutcount->id,'aboutcount_id')]];
        }
        $rules += [
            'count' => 'required|max:100',
        ];
        
        $request->validate($rules);
        $request_data=$request->all();
        
        $aboutcount->update($request_data);

        return redirect()->route('dashboard.aboutcount.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aboutcount  $aboutcount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aboutcount $aboutcount)
    {
        $aboutcount->delete();
        return \redirect()->route('dashboard.aboutcount.index');
    }
}
