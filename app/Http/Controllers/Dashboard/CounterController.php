<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CounterController extends Controller
{
    public function index()
    {
        $counters = Counter::all();
        return view('dashboard.counters.index',compact('counters'));
    }

    public function create()
    {
        $counters = Counter::all();
        return view('dashboard.counters.create',compact('counters'));
    }

    public function store(Request $request,Counter $counter)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

        //     $rules += [$locale . '.title' => ['required',Rule::unique('aboutsec_translations','title')]];
         
        // }

        // $request->validate($rules);
        $request_data=$request->all();
        $counter->create($request_data);

        return redirect()->route('dashboard.counter.index');
    }

    public function edit(Counter $counter)
    {
        return view('dashboard.counters.edit',compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutsec  $aboutsec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counter $counter)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

        //     $rules += [$locale . '.title' => ['required',Rule::unique('aboutsec_translations','title')->ignore($aboutsec->id,'aboutsec_id')]];

        // }

        // $request->validate($rules);
        $request_data=$request->all();
        $counter->update($request_data);

        return redirect()->route('dashboard.counter.index');
    }

    public function destroy(Counter $counter)
    {
        $counter->delete();
        return \redirect()->route('dashboard.counter.index');
    }
}
