<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Servicesone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ServicesoneController extends Controller
{
    public function index()
    {
        $servicesones = Servicesone::all();
        return view('dashboard.servicesones.index',compact('servicesones'));
    }

    public function create()
    {
        $servicesones = Servicesone::all();
        return view('dashboard.servicesones.create',compact('servicesones'));
    }

    public function store(Request $request,Servicesone $servicesone)
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
        $servicesone->create($request_data);

        return redirect()->route('dashboard.servicesone.index');
    }

    public function edit(Servicesone $servicesone)
    {
        return view('dashboard.servicesones.edit',compact('servicesone'));
    }

    public function update(Request $request, Servicesone $servicesone)
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
        $servicesone->update($request_data);

        return redirect()->route('dashboard.servicesone.index');
    }

    public function destroy(Servicesone $servicesone)
    {
        $servicesone->delete();
        return \redirect()->route('dashboard.servicesone.index');
    }
}
