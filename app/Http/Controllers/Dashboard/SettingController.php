<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('dashboard.settings.index',compact('settings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = Setting::all();
        return view('dashboard.settings.create',compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Setting $setting)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.address' => ['required',Rule::unique('setting_translations','address')]];

        }
        $rules += [
            'phone' => 'required|max:100',
            'email' => 'required|email|max:100',
            'facebook_link' => 'required|string',
            'twitter_link' => 'required|string',
            'linkedin_link' => 'required|string',
            'youtube_link' => 'required|string',
            'fax' => 'required|string',
            'map' => 'required|string',
        ];

        $request->validate($rules);
        $request_data=$request->all();
        $setting->create($request_data);

        return redirect()->route('dashboard.setting.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {

        return view('dashboard.settings.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.address' => ['required',Rule::unique('setting_translations','address')->ignore($setting->id,'setting_id')]];


        }
        $rules += [
            'phone' => 'required|max:100',
            'email' => 'required|email|max:100',
            'facebook_link' => 'required|string',
            'twitter_link' => 'required|string',
            'linkedin_link' => 'required|string',
            'youtube_link' => 'required|string',
            'fax' => 'required|string',
            'map' => 'required|string',
        ];

        $request->validate($rules);
        $request_data=$request->all();
        $setting->update($request_data);

        return redirect()->route('dashboard.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return \redirect()->route('dashboard.setting.index');
    }
}
