<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('dashboard.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('dashboard.projects.create',compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $rules=[];
//
//        foreach(config('translatable.locales') as $locale){
//
//            $rules += [$locale . '.title' => ['required',Rule::unique('project_translations','title')]];
//        }
//
//        $request->validate($rules);

        $request_data=$request->all();

        if ($request->img) {
            Image::make($request->img)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/project/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $project=Project::create($request_data);

        $id=$project->id;

        //img


        $i =0;


        if($images = $request->file('images')){
            foreach($request->file('images') as $images){


                $destinationPath =public_path().'/uploads/project/images/';
                $extension = $images->getClientOriginalExtension();
                $fileName = $id.'image'. $i . '.'.$extension;
                $images->move($destinationPath, $fileName);

                $imags =array([
                    'project_id' =>  $id,
                    'img' => $fileName,
                ]);

                ProjectImages::insert($imags);
                $i++;
                // $image_count=Imagepainting::where('painting_id',$id)->count();

            }
        }

        return redirect()->route('dashboard.project.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('dashboard.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){


            $rules += [$locale . '.title' => ['required',Rule::unique('project_translations','title')->ignore($project->id,'project_id')]];
        }

        $request->validate($rules);
        $request_data=$request->all();

        if ($request->img) {

            if ($project->img != 'default.png') {

                Storage::disk('public_uploads')->delete('/project/' . $project->img);

            } // end of inner if

            Image::make($request->img)
                ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/project/' . $request->img->hashName()));
            $request_data['img']=$request->img->hashName();
        }

        $project->update($request_data);

        return redirect()->route('dashboard.project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->img != 'default.png') {

            Storage::disk('public_uploads')->delete('/project/' . $project->img);

        } // end of inner if
//        $project->delete();
        $id=$project->id;

        $img=ProjectImages::find($id);

        $paintings = $project::findOrFail($id);

        $destinationPath = public_path('/uploads/project/images/').$paintings->img;

        if(File::exists($destinationPath)){
            File::delete($destinationPath);
        }

        $images = ProjectImages::where('project_id',$id)->get();
        foreach($images as $image){

            $path = public_path('/uploads/project/images/').$image->img;
            if(File::exists($path)){
                File::delete($path);
            }
        }

        $project->delete();
        return \redirect()->route('dashboard.project.index');
    }
}
