<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class CertificateController extends Controller
{
    public function index(Request $request)
    {

        $certs = Certificate::select()->orderBy('created_at', 'desc')->paginate(10);


        return view('Dashboard.Certs.index', compact('certs'));
    }

    public function add()
    {
        return view('Dashboard.Certs.add');
    }

    public function doadd(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => "required|string|max:50",
                'image' => 'mimes:png,jpg,jpeg|nullable',
            ]
        );

        if ($validator->fails()) {
            toast('Creation Failed', 'error' ,  'top-right')->showCloseButton();
            Alert::error('Creation Failed' , $validator->errors()->all());
            return back()->withErrors($validator->errors())->withInput();
        } else {

            //start img
            if ($request->has('image')) {

                $path = $request->file('image')->storePublicly('certimgs' , 's3');
                // $url = Storage::disk('s3')->url($path);
                $data = $request->all();
                $data['image']=$path;
                $s = Certificate::create($data);
            } else {
                $s = Certificate::create($request->all());
            }
            toast('Creation Done', 'success' ,  'top-right')->showCloseButton();
            Alert::success('Creation Done' , $s->title . ' certificate created successfully');
            return redirect(route('certificate'));
        }
    }


    public function edit($id)
    {
        $cert = Certificate::find($id);
        return view('Dashboard.Certs.edit', compact('cert'));
    }


    public function doedit(Request $request)
    {

        // dd($request->all());
        $data = $request->all();

        $validator = Validator::make(
            $request->all(),
            [
                'title' => "required|string|max:50",
                'image' => 'mimes:png,jpg,jpeg|nullable',
                'id' => 'exists:certificates,id'
            ]
        );

        if ($validator->fails()) {
            toast('Edit Failed', 'error' ,  'top-right')->showCloseButton();
            Alert::error('Edit Failed' , $validator->errors()->all());
            return back()->withErrors($validator->errors())->withInput();
        } else {

            $cert = Certificate::find($request->id);

            if ($request->hasFile('image')) {
                $OldImg = $cert->image;

                //has no old image
                if ($OldImg == null) {
                    $path = $request->file('image')->storePublicly('certimgs' , 's3');
                    // $url = Storage::disk('s3')->url($path);
                    $data['image'] = $path;
                }
                //has old image
                else {
                    $path = $cert->image;
                    if(Storage::disk('s3')->exists($path)) {
                        Storage::disk('s3')->delete($path);
                    }
                    $path = $request->file('image')->storePublicly('certimgs' , 's3');
                    $data = $request->all();
                    $data['image'] = $path;
                }

                $cert->update($data);
            } else {
                $cert->update($request->all());
                $cert->save();
            }
            toast('Creation Done', 'success' ,  'top-right')->showCloseButton();
            Alert::success('Creation Done' , $cert->title . ' certificate edited successfully');
            return redirect(route('certificate'));
        }
    }

    public function show($id)
    {
        $cert = Certificate::find($id);
        // dd($q);
        return view('Dashboard.Certs.show', compact('cert'));
    }

    public function delete($id)
    {
        $q = Certificate::find($id);
        $path = $q->image;
        if(Storage::disk('s3')->exists($path)) {
            Storage::disk('s3')->delete($path);
        }

        $q->delete();
        toast('Delete Done', 'success' ,  'top-right')->showCloseButton();
        Alert::success('Delete Done' , $q->title . ' deleted successfully');
        return (redirect(route('certificate')));
    }
}
