<?php

namespace App\Http\Controllers;

use App\Models\Aboutme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
public function index()
{
    $about = Aboutme::first();
    return view('Dashboard.About me.index' , compact('about'));
}

public function edit($id)
{
    $about = Aboutme::find($id);
    return view('Dashboard.About me.edit' , compact('about'));
}

public function doedit(Request $request)
{
    $data = $request->all();

    $validator = Validator::make($data, [
        'name' => 'required|max:255',
        'id' => 'required|exists:aboutmes,id',
        'phone' => 'required',
        'email' => 'required|email',
        'degree' => 'required',
        'description' => 'required',
        'address' => 'required',
        'exp' => 'required',
        'JobTitle' => 'required',
        'freelance' => 'required',
        'birth' => 'nullable',
        'image' => 'nullable|image|mimes:png,jpg,jpeg',
    ]);

    if($validator->fails())
    {
        toast('top-right')->showCloseButton();
        Alert::error('Edit Failed', $validator->errors()->all());
        return back()->withErrors($validator->errors())->withInput();
    }


    $about = Aboutme::find($request->id);

    if ($request->hasFile('image')) {
        //check old image
        $OldImg = $about->image;
         //has no old image
        if ($OldImg == null) {
            $path = $request->file('image')->storePublicly('about' , 's3');
            // $url = Storage::disk('s3')->url($path);
            $newImgName = $path;
        }
        //has old image
        else {
            $path = $about->image;
            if(Storage::disk('s3')->exists($path)) {
                Storage::disk('s3')->delete($path);
            }
            $path = $request->file('image')->storePublicly('about' , 's3');
            $newImgName = $path;
            }

        $about->name = $request->name;
        $about->email = $request->email;
        $about->address = $request->address;
        $about->phone = $request->phone;

        if($request->birth != null)
            $about->date_of_birth = $request->birth;

        $about->JobTitle = $request->JobTitle;
        $about->freelance = $request->freelance;
        $about->exp = $request->exp;
        $about->desc = $request->description;
        $about->degree = $request->degree;
        $about->image = $newImgName;
    }
    else
    {
        $about->name = $request->name;
        $about->email = $request->email;
        $about->address = $request->address;
        $about->phone = $request->phone;

        if($request->birth != null)
            $about->date_of_birth = $request->birth;

        $about->JobTitle = $request->JobTitle;
        $about->freelance = $request->freelance;
        $about->exp = $request->exp;
        $about->desc = $request->description;
        $about->degree = $request->degree;
    }
    $about->save();

    toast('top-right')->showCloseButton();
    Alert::success('Edit Done');
    return redirect(route('about'));
}

}
