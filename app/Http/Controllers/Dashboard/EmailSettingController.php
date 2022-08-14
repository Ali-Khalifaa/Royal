<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\EmailSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmailSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emailSittings = EmailSetting::all();
        return view('dashboard.emailSetting.index',compact('emailSittings'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aboutsec  $aboutsec
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailSetting $emailSetting)
    {
//       $date=  Carbon::parse($emailSetting->registration_date);
//       $date->format('y F d');
        return view('dashboard.emailSetting.edit',compact('emailSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutsec  $aboutsec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailSetting $emailSetting)
    {
        $emailSetting->update($request->all());

        return redirect()->route('dashboard.emailSetting.index');
    }

}
