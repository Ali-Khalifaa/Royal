<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Aboutthree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class AboutsectionthreeController extends Controller
{
    public function index()
    {
        $aboutsectionthrees = Aboutthree::all();
        return view('dashboard.aboutsectionthrees.index',compact('aboutsectionthrees'));
    }

    public function create()
    {
        $aboutsectionthrees = Aboutthree::all();
        return view('dashboard.aboutsectionthrees.create',compact('aboutsectionthrees'));
    }

    public function store(Request $request,Aboutthree $aboutsectionthree)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            // $rules += [$locale . '.desc_one' => ['required',Rule::unique('job_translations','desc_one')]];
            // $rules += [$locale . '.desc_two' => ['required',Rule::unique('job_translations','desc_two')]];
            // $rules += [$locale . '.desc_three' => ['required',Rule::unique('job_translations','desc_three')]];

        }
        $rules += [
            // 'phone' => 'required|max:100',
            // 'email' => 'required|email|max:100',
        ];

        $request->validate($rules);
        $request_data=$request->all();
        $aboutsectionthree->create($request_data);

        return redirect()->route('dashboard.aboutsectionthree.index');
    }

    public function edit(Aboutthree $aboutsectionthree)
    {
        return view('dashboard.aboutsectionthrees.edit',compact('aboutsectionthree'));
    }

    public function update(Request $request, Aboutthree $aboutsectionthree)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            // $rules += [$locale . '.desc_one' => ['required',Rule::unique('job_translations','desc_one')->ignore($job->id,'job_id')]];
            // $rules += [$locale . '.desc_two' => ['required',Rule::unique('job_translations','desc_two')->ignore($job->id,'job_id')]];
            // $rules += [$locale . '.desc_three' => ['required',Rule::unique('job_translations','desc_three')->ignore($job->id,'job_id')]];
            
        }
        $rules += [
            // 'phone' => 'required|max:100',
            // 'email' => 'required|email|max:100',
        ];

        $request->validate($rules);
        $request_data=$request->all();
        $aboutsectionthree->update($request_data);

        return redirect()->route('dashboard.aboutsectionthree.index');
    }

    public function destroy(Aboutthree $aboutsectionthree)
    {
        $aboutsectionthree->delete();
        return \redirect()->route('dashboard.aboutsectionthree.index');
    }
}
