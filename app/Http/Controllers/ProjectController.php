<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    public function index(Request $request)
    {

        $projects = Project::select()->orderBy('created_at', 'desc')->paginate(10);


        return view('Dashboard.Projects.index', compact('projects'));
    }

    public function add()
    {
        return view('Dashboard.Projects.add');
    }

    public function doadd(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => "required|string|max:50",
                'desc' => 'required|string',
                'images' => 'required',
                'images.*' =>'mimes:png,jpg,jpeg|image',
            ]
        );

        if ($validator->fails()) {
            toast('top-right')->showCloseButton();
            Alert::error('Add Failed' , $validator->errors()->all());
            return back()->withErrors($validator->errors())->withInput();
        } else {
        //Create With 2 stetps
            //1- Create Project in projects table
            //2- Assign its images in project_images table
        //1-


        $project = new Project();
        $project->title = $request->title;
        $project->desc = $request->desc;
        $project->save();

        //2-
            if ($request->has('images')) {

                foreach ($request->images as $image) {
                //New Image code
                $path = $image->storePublicly('projects/'.$project->title , 's3');
                $project_image = new ProjectImages();
                $project_image->project_id= $project->id;
                $project_image->image = $path;
                $project_image->save();
                }
            }
            toast('top-right')->showCloseButton();
            Alert::success('Create Done' ,$project->title. ' Created Successfully');
            return redirect(route('project'));
        }
    }


    public function edit($id)
    {
        $project = Project::find($id);
        $images = $project->images()->get();

        return view('Dashboard.Projects.edit', compact('project' , 'images'));
    }


    public function doedit(Request $request)
    {

        // dd($request->all());
        $data = $request->all();

        $validator = Validator::make(
            $request->all(),
            [
                'title' => "required|string|max:50",
                'images' => 'nullable',
                'images.*' =>'mimes:png,jpg,jpeg|image',
                'desc' => 'required|string',
                'id' => 'exists:projects,id'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $project = Project::find($request->id);
            $project->title = $request->title;
            $project->desc = $request->desc;
            $project->save();

            // if ($request->hasFile('images')) {

            //     foreach ($request->images as $image) {
            //         //check old image
            //         $OldImgs = $project->images()->get();

            //         //has no old image
            //         if ($OldImgs == null) {
            //             //New Image code
            //             $path = $image->storePublicly('projects/'.$project->title , 's3');
            //             $project_image = new ProjectImages();
            //             $project_image->project_id= $project->id;
            //             $project_image->image = $path;
            //             $project_image->save();
            //             }
            //             //has old image
            //         else {
            //                 $path = $project->image;
            //                 if(Storage::disk('s3')->exists($path)) {
            //                     Storage::disk('s3')->delete($path);
            //                 }
            //                 $path = $request->file('image')->storePublicly('projects' , 's3');
            //                 $data['image'] = $path;
            //             }
            //     }
            //     $project->update($data);
            // }

            return redirect(route('project'))->with($message = 'project Edited Succefully');
        }
    }

    public function show($id)
    {
        $project = Project::find($id);
        $images = $project->images()->get();
        return view('Dashboard.Projects.show', compact('project' , 'images'));
    }

    public function delete($id)
    {
        $project = Project::find($id);
        $images = $project->images()->get();
        foreach ($images as $image) {
            $path = $image->image;
            if(Storage::disk('s3')->exists($path)) {
                Storage::disk('s3')->delete($path);
            }
        }
        toast('top-right')->showCloseButton();
        Alert::success('Delete Done' ,$project->title. ' Deleted Successfully');
        $project->delete();
        return (redirect(route('project')));
    }



    public function usershow($id)
    {
        $project = Project::find($id);
        $images = $project->images()->get();
        return view('single-blog', compact('project' , 'images'));
    }
}
