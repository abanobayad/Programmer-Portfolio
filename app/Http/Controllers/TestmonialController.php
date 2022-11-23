<?php

namespace App\Http\Controllers;

use App\Models\Testmonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TestmonialController extends Controller
{
    public function index(Request $request)
    {

        $tests = Testmonial::select()->orderBy('created_at', 'desc')->paginate(10);


        return view('Dashboard.Testmonials.index', compact('tests'));
    }

    public function add()
    {
        return view('Dashboard.Testmonials.add');
    }

    public function doadd(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|string|max:50",
                'title' => "required|string|max:50",
                'image' => 'mimes:png,jpg,jpeg|nullable',
                'comment' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            toast('top-right')->showCloseButton();
            Alert::error('Add Failed' , $validator->errors()->all());
            return back()->withErrors($validator->errors())->withInput();
        } else {

            if ($request->has('image')) {
                //New Image code
                $path = $request->file('image')->storePublicly('testmonials' , 's3');
                $data['image'] = $path;
                $s = Testmonial::create($data);
            } else {
                $s = Testmonial::create($request->all());
            }
            return redirect(route('testmonial'))->with($message = 'Testmonial Created Succefully');
        }
    }


    public function edit($id)
    {
        $test = Testmonial::find($id);
        return view('Dashboard.Testmonials.edit', compact('test'));
    }


    public function doedit(Request $request)
    {

        // dd($request->all());
        $data = $request->all();

        $validator = Validator::make(
            $request->all(),
            [
                'title' => "required|string|max:50",
                'name' => "required|string|max:50",
                'image' => 'mimes:png,jpg,jpeg|nullable',
                'comment' => 'required|string',
                'id' => 'exists:testmonials,id'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $test = Testmonial::find($request->id);

            if ($request->hasFile('image')) {
                //check old image
                $OldImg = $test->image;

                //has no old image
                if ($OldImg == null) {
                    $path = $request->file('image')->storePublicly('testmonials' , 's3');
                    $data['image'] = $path;
                }
                //has old image
                else {
                    $path = $test->image;
                    if(Storage::disk('s3')->exists($path)) {
                        Storage::disk('s3')->delete($path);
                    }
                    $path = $request->file('image')->storePublicly('testmonials' , 's3');
                    $data['image'] = $path;
                }

                $test->update($data);
            } else {
                $test->update($request->all());
                $test->save();
            }
            return redirect(route('testmonial'))->with($message = 'Testmonial Edited Succefully');
        }
    }

    public function show($id)
    {
        $test = Testmonial::find($id);
        // dd($q);
        return view('Dashboard.Testmonials.show', compact('test'));
    }

    public function delete($id)
    {
        $q = Testmonial::find($id);
        $path = $q->image;
        if(Storage::disk('s3')->exists($path)) {
            Storage::disk('s3')->delete($path);
        }
        toast('top-right')->showCloseButton();
        Alert::success('Delete Done' ,$q->title. ' Deleted Successfully');
        $q->delete();
        return (redirect(route('testmonial')));
    }
}
