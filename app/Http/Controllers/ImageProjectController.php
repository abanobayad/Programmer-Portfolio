<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ImageProjectController extends Controller
{

    public function doadd(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'images' => 'required',
                'images.*' => 'mimes:png,jpg,jpeg|image',
                'id' => 'required|exists:projects,id'
            ]
        );

        $project = Project::find($request->id);
        if ($validator->fails()) {
            toast('top-right')->showCloseButton();
            Alert::error('Add Failed', $validator->errors()->all());
            return back()->withErrors($validator->errors())->withInput();
        } else {
            //Create With 2 stetps
            //1- Create Project in projects table
            //2- Assign its images in project_images table
            //1-

            //2-
            if ($request->has('images')) {

                foreach ($request->images as $image) {
                    //New Image code
                    $path = $image->storePublicly('projects/' . $project->title, 's3');
                    $project_image = new ProjectImages();
                    $project_image->project_id = $project->id;
                    $project_image->image = $path;
                    $project_image->save();
                }
            }
            toast('top-right')->showCloseButton();
            Alert::success('Add Done', $project->title . ' Images Inserted Successfully');
            return back();
        }
    }




    public function doedit(Request $request)
    {
        $image = ProjectImages::find($request->id);
        $project = $image->project()->first()->title;
        // dd($project);
        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'required|mimes:png,jpg,jpeg|image',
                'id' => 'exists:project_images,id'
            ]
        );

        if ($validator->fails()) {
            toast('top-right')->showCloseButton();
            Alert::error('Edit Done', $validator->errors()->all());
            return back()->withInput();
        } else {
            $path = $image->image;
            if (Storage::disk('s3')->exists($path)) {
                Storage::disk('s3')->delete($path);
            }
            $path = $request->file('image')->storePublicly('projects/'.$project, 's3');
            $image->image = $path;
            $image->save();
        }
        toast('top-right')->showCloseButton();
        Alert::success('Edit Done', 'Image Edited Succefully');
        return back();
    }


    public function show($id)
    {
        $image = ProjectImages::find($id);
        $project = $image->project()->first();
        // dd($project);
        return view('Dashboard.Projects.Images.show', compact('project', 'image'));
    }

    public function delete($id)
    {
        $image = ProjectImages::find($id);
        $project = $image->project()->first();
        // dd($project);
        $total_images = $project->images()->get();
        // dd($total_images->count());

        if($total_images->count() <= 1)
        {
            toast('top-right')->showCloseButton();
            Alert::error('Delete Failed', "Project must contain at least one one image");
            return back();
        }

        $path = $image->image;
        if (Storage::disk('s3')->exists($path)) {
            Storage::disk('s3')->delete($path);
        }

        toast('top-right')->showCloseButton();
        Alert::success('Delete Done', 'Image Deleted Successfully');
        $image->delete();
        return redirect(route('project.show' , $project->id));
    }
}
