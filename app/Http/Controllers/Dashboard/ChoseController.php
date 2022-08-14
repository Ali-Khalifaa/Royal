<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Chose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ChoseController extends Controller
{
    public function index()
    {
        $choses = Chose::all();
        return view('dashboard.choses.index',compact('choses'));
    }

    public function create()
    {
        $choses = Chose::all();
        return view('dashboard.choses.create',compact('choses'));
    }

    public function store(Request $request,Chose $chose)
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

        if($request->hasFile('pdf')){

            $img = $request->file('pdf');
            $ext = $img->getClientOriginalExtension();
            $name = "pdf-". uniqid() . ".$ext";
            $img->move( public_path('uploads/home/choose/pdf/') , $name);
            $request_data['pdf'] = $name;
        }

        $chose->create($request_data);

        return redirect()->route('dashboard.chose.index');
    }

    public function edit(Chose $chose)
    {
        return view('dashboard.choses.edit',compact('chose'));
    }

    public function update(Request $request, Chose $chose)
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

        if($request->hasFile('pdf')){
            $old_name =  $chose->pdf;
            if($old_name)
            {
                unlink( public_path('uploads/home/choose/pdf/') . $old_name );
            }

            $img = $request->file('pdf');
            $ext = $img->getClientOriginalExtension();
            $name = "pdf-". uniqid() . ".$ext";

            $img->move( public_path('uploads/home/choose/pdf/') , $name);
            $request_data['pdf']=$name;

        }

        $chose->update($request_data);

        return redirect()->route('dashboard.chose.index');
    }

    public function destroy(Chose $chose)
    {
        $chose->delete();
        return \redirect()->route('dashboard.chose.index');
    }
}
