<?php

namespace App\Http\Controllers;

use App\Models\Quality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class QualityController extends Controller
{
    public function index(Request $request)
    {
        $selected_qs = $request->has('qs') ? $request->get('qs') : null;

        $qs = Quality::select()->orderBy('created_at', 'desc')->paginate(10);

        if ($selected_qs != null) {

            if ($selected_qs == 'exp') {
                $qs = Quality::select()->where('type', 'expericence')->orderBy('created_at', 'desc')->paginate(10);
            }
            if ($selected_qs == 'edu') {
                $qs = Quality::select()->where('type', 'education')->orderBy('created_at', 'desc')->paginate(10);
            }
        }

        return view('Dashboard.Quality.index', compact('qs', 'selected_qs'));
    }

    public function add()
    {
        return view('Dashboard.Quality.add');
    }

    public function doadd(Request $request)
    {
        $types = ['education', 'expericence'];
        $validator = Validator::make(
            $request->all(),
            [
                'title' => "required|string|max:50",
                'org' => "required|string|max:50",
                'desc' => "required|string",
                'type' => Rule::in($types),
                'start_at' => "required|date",
                'end_at' => "required|date",
            ]
        );

        if ($validator->fails()) {
            toast('top-right')->showCloseButton();
            Alert::error('Add Failed' , $validator->errors()->all());
            return back()->withErrors($validator->errors())->withInput();
        } else {


            $q = Quality::create($request->all());
            toast('top-right')->showCloseButton();
            Alert::success('Add Done' , $q->title .' Quality Created Successfully');
            return redirect(route('quality'));
        }
    }


    public function edit($id)
    {
        $q = Quality::find($id);
        return view('Dashboard.Quality.edit', compact('q'));
    }


    public function doedit(Request $request)
    {
        $types = ['education', 'expericence'];
        $validator = Validator::make(
            $request->all(),
            [
                'title' => "required|string|max:50",
                'org' => "required|string|max:50",
                'desc' => "required|string",
                'type' => Rule::in($types),
                'start_at' => "required|date",
                'end_at' => "required|date",
                'id' => 'exists:qualities,id'
            ]
        );

        if ($validator->fails()) {
            toast('top-right')->showCloseButton();
            Alert::error('Edit Failed' , $validator->errors()->all());
            return back()->withInput();
        } else {

            $q = Quality::find($request->id);
            $q->update($request->all());
            $q->save();

            toast('top-right')->showCloseButton();
            Alert::success('Edit Done' , 'Quality Edited Successfully');
            return redirect(route('quality'));
        }
    }

    public function show($id)
    {
        $q = Quality::find($id);
        // dd($q);
        return view('Dashboard.Quality.show', compact('q'));
    }

    public function delete($id)
    {
        $q = Quality::find($id);

        toast('top-right')->showCloseButton();
        Alert::success('Delete Done' ,$q->title. ' Deleted Successfully');
        $q->delete();
        return(redirect(route('quality')));
    }
}
