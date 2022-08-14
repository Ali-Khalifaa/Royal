<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents=Agent::all();
        return view('dashboard.agents.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents=Agent::all();
        return view('dashboard.agents.create',compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Agent $agent)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

        //     $rules += [$locale . '.name' => ['required',Rule::unique('agent_translations','name')]];
        //     $rules += [$locale . '.position' => ['required',Rule::unique('agent_translations','position')]];
        // }

        // $request->validate($rules);

        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/about/agent/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $agent::create($request_data);

        return redirect()->route('dashboard.agent.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        return view('dashboard.agents.edit',compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        // $rules=[];

        // foreach(config('translatable.locales') as $locale){

           
        //     $rules += [$locale . '.name' => ['required',Rule::unique('agent_translations','name')->ignore($agent->id,'agent_id')]];
        //     $rules += [$locale . '.position' => ['required',Rule::unique('agent_translations','position')->ignore($agent->id,'agent_id')]];
        // }

        // $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {

            if ($agent->img != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/about/agent/' . $agent->img);

            } // end of inner if

            Image::make($request->img)
                ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/about/agent/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $agent->update($request_data);

        return redirect()->route('dashboard.agent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        if ($agent->img != 'default.png') {           
            Storage::disk('public_uploads')->delete('/about/agent/' . $agent->img);
        } // end of inner if
        $agent->delete();
        \session()->flash('success',__('site.deleted_successfuly'));
        return \redirect()->route('dashboard.agent.index');
    }
}
