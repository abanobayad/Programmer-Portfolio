<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function index(Request $request)
    {

        $services = Service::select()->orderBy('created_at', 'desc')->paginate(10);


        return view('Dashboard.Services.index', compact('services'));
    }

    public function add()
    {
        return view('Dashboard.Services.add');
    }

    public function doadd(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => "required|string|max:50",
                'fontaws' => "required|string|max:100",
                'desc' => "required|string",
            ]
        );

        if ($validator->fails()) {
            toast('top-right')->showCloseButton();
            Alert::error('Add Failed');
            return back()->withErrors->withErrors($validator->errors())->withInput();
        } else {

            $s = Service::create($request->all());
            toast('top-right')->showCloseButton();
            Alert::success('Add Done' , $s->title .' Service Created Successfully');
            return redirect(route('service'));
        }
    }


    public function edit($id)
    {
        $service = Service::find($id);
        return view('Dashboard.Services.edit', compact('service'));
    }


    public function doedit(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => "required|string|max:50",
                'fontaws' => "required|string|max:100",
                'desc' => "required|string",
                'id' => 'exists:services,id'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $service = Service::find($request->id);
            $service->update($request->all());
            $service->save();
            toast('top-right')->showCloseButton();
            Alert::success('Edit Done' , 'service Edited Successfully');
            return redirect(route('service'));
        }
    }

    public function show($id)
    {
        $service = Service::find($id);
        // dd($q);
        return view('Dashboard.Services.show', compact('service'));
    }

    public function delete($id)
    {
        $q = Service::find($id);
        toast('top-right')->showCloseButton();
        Alert::success('Delete Done' ,$q->title. ' Deleted Successfully');
        $q->delete();
        return(redirect(route('service')));
    }
}
