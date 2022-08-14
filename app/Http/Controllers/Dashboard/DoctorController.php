<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('dashboard.doctors.index',compact('doctors'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('dashboard.doctors.create',compact('doctors'));
    }

    public function store(Request $request, Doctor $doctor)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            // $rules += [$locale . '.title_one' => ['required',Rule::unique('aboutsetting_translations','title_one')]];
            // $rules += [$locale . '.title_two' => ['required',Rule::unique('aboutsetting_translations','title_two')]];
            // $rules += [$locale . '.title_three' => ['required',Rule::unique('aboutsetting_translations','title_three')]];
            // $rules += [$locale . '.desc' => ['required',Rule::unique('aboutsetting_translations','desc')]];
        }

        $request->validate($rules);

        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize( null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/doctors/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $doctor::create($request_data);

        return redirect()->route('dashboard.doctor.index');
    }

    public function edit(Doctor $doctor)
    {
        return view('dashboard.doctors.edit',compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

           
            // $rules += [$locale . '.title_one' => ['required',Rule::unique('aboutsetting_translations','title_one')->ignore($aboutsetting->id,'aboutsetting_id')]];
            // $rules += [$locale . '.title_two' => ['required',Rule::unique('aboutsetting_translations','title_two')->ignore($aboutsetting->id,'aboutsetting_id')]];
            // $rules += [$locale . '.title_three' => ['required',Rule::unique('aboutsetting_translations','title_three')->ignore($aboutsetting->id,'aboutsetting_id')]];
            // $rules += [$locale . '.desc' => ['required',Rule::unique('aboutsetting_translations','desc')->ignore($aboutsetting->id,'aboutsetting_id')]];
        }

        $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {

            if ($doctor->img != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/doctors/' . $doctor->img);

            } // end of inner if

            Image::make($request->img)
                ->resize( null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/doctors/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $doctor->update($request_data);

        return redirect()->route('dashboard.doctor.index');
    }

    public function destroy(Doctor $doctor)
    {
        if ($doctor->img != 'default.png') {
                
            Storage::disk('public_uploads')->delete('/doctors/' . $doctor->img);

        } // end of inner if
        $doctor->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.doctor.index');
    }
}
