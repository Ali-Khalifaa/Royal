<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
       return view('dashboard.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('dashboard.services.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Service $service)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            // $rules += [$locale . '.who_we_are' => ['required',Rule::unique('service_translations','who_we_are')]];
            // $rules += [$locale . '.mission' => ['required',Rule::unique('service_translations','mission')]];
            // $rules += [$locale . '.vision' => ['required',Rule::unique('service_translations','vision')]];
            // $rules += [$locale . '.values' => ['required',Rule::unique('service_translations','values')]];
            // $rules += [$locale . '.who_we_are_desc' => ['required',Rule::unique('service_translations','who_we_are_desc')]];
            // $rules += [$locale . '.mission_desc' => ['required',Rule::unique('service_translations','mission_desc')]];
            // $rules += [$locale . '.vision_desc' => ['required',Rule::unique('service_translations','vision_desc')]];
            // $rules += [$locale . '.values_desc' => ['required',Rule::unique('service_translations','values_desc')]];
        }

        $request->validate($rules);
        $request_data=$request->all();
        $service->create($request_data);

        return redirect()->route('dashboard.service.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('dashboard.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            // $rules += [$locale . '.who_we_are' => ['required',Rule::unique('service_translations','who_we_are')->ignore($service->id,'service_id')]];
            // $rules += [$locale . '.mission' => ['required',Rule::unique('service_translations','mission')->ignore($service->id,'service_id')]];
            // $rules += [$locale . '.vision' => ['required',Rule::unique('service_translations','vision')->ignore($service->id,'service_id')]];
            // $rules += [$locale . '.values' => ['required',Rule::unique('service_translations','values')->ignore($service->id,'service_id')]];
            // $rules += [$locale . '.who_we_are_desc' => ['required',Rule::unique('service_translations','who_we_are_desc')->ignore($service->id,'service_id')]];
            // $rules += [$locale . '.mission_desc' => ['required',Rule::unique('service_translations','mission_desc')->ignore($service->id,'service_id')]];
            // $rules += [$locale . '.vision_desc' => ['required',Rule::unique('service_translations','vision_desc')->ignore($service->id,'service_id')]];
            // $rules += [$locale . '.values_desc' => ['required',Rule::unique('service_translations','values_desc')->ignore($service->id,'service_id')]];
        }

        $request->validate($rules);
        $request_data=$request->all();
        $service->update($request_data);

        return redirect()->route('dashboard.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return \redirect()->route('dashboard.service.index');
    }
}
