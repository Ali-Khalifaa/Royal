<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NationalityController extends Controller
{
    public function index()
    {
        $nationalities = Nationality::all();
        return view('dashboard.nationalities.index',compact('nationalities'));
    }

    public function create()
    {
        $nationalities = Nationality::all();
        return view('dashboard.nationalities.create',compact('nationalities'));
    }


    public function store(Request $request,Nationality $nationality)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

        //     $rules += [$locale . '.title' => ['required',Rule::unique('aboutsec_translations','title')]];
         
        // }

        // $request->validate($rules);
        $request_data=$request->all();
        $nationality->create($request_data);

        return redirect()->route('dashboard.nationality.index');
    }

    public function edit(Nationality $nationality)
    {
        return view('dashboard.nationalities.edit',compact('nationality'));
    }

    public function update(Request $request, Nationality $nationality)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

        //     $rules += [$locale . '.title' => ['required',Rule::unique('aboutsec_translations','title')->ignore($aboutsec->id,'aboutsec_id')]];

        // }

        // $request->validate($rules);
        $request_data=$request->all();
        $nationality->update($request_data);

        return redirect()->route('dashboard.nationality.index');
    }

    public function destroy(Nationality $nationality)
    {
        $nationality->delete();
        return \redirect()->route('dashboard.nationality.index');
    }
}
