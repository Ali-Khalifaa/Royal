<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return view('dashboard.specializations.index',compact('specializations'));
    }

    public function create()
    {
        $specializations = Specialization::all();
        return view('dashboard.specializations.create',compact('specializations'));
    }


    public function store(Request $request,Specialization $specialization)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

        //     $rules += [$locale . '.title' => ['required',Rule::unique('aboutsec_translations','title')]];
         
        // }

        // $request->validate($rules);
        $request_data=$request->all();
        $specialization->create($request_data);

        return redirect()->route('dashboard.specialization.index');
    }

    public function edit(Specialization $specialization)
    {
        return view('dashboard.specializations.edit',compact('specialization'));
    }

    public function update(Request $request, Specialization $specialization)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

        //     $rules += [$locale . '.title' => ['required',Rule::unique('aboutsec_translations','title')->ignore($aboutsec->id,'aboutsec_id')]];

        // }

        // $request->validate($rules);
        $request_data=$request->all();
        $specialization->update($request_data);

        return redirect()->route('dashboard.specialization.index');
    }

    public function destroy(Specialization $specialization)
    {
        $specialization->delete();
        return \redirect()->route('dashboard.specialization.index');
    }
}
