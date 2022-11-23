<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class SkillController extends Controller
{
    public function index(Request $request)
    {

        $skills = Skill::select()->orderBy('created_at', 'desc')->paginate(10);


        return view('Dashboard.Skills.index', compact('skills'));
    }

    public function add()
    {
        return view('Dashboard.Skills.add');
    }

    public function doadd(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => "required|string|max:50",
                'value' => "required|integer|max:100|min:0",
            ]
        );

        if ($validator->fails()) {
            toast('top-right')->showCloseButton();
            Alert::error('Add Failed' , $validator->errors()->all());
            return back()->withErrors($validator->errors())->withInput();
        } else {


            $s = Skill::create($request->all());
            toast('top-right')->showCloseButton();
            Alert::success('Add Done' , $s->title .' Skill Created Successfully');
            return redirect(route('skill'));
        }
    }


    public function edit($id)
    {
        $skill = Skill::find($id);
        return view('Dashboard.Skills.edit', compact('skill'));
    }


    public function doedit(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => "required|string|max:50",
                'value' => "required|integer|max:100|min:0",
                'id' => 'exists:skills,id'
            ]
        );

        if ($validator->fails()) {
            toast('top-right')->showCloseButton();
            Alert::error('Edit Failed' , $validator->errors()->all());
            return back()->withErrors($validator->errors())->withInput();
        } else {

            $skill = Skill::find($request->id);
            $skill->update($request->all());
            $skill->save();
            toast('top-right')->showCloseButton();
            Alert::success('Edit Done' , $skill->title .' Skill Edited Successfully');
            return redirect(route('skill'));
        }
    }

    public function show($id)
    {
        $skill = Skill::find($id);
        // dd($q);
        return view('Dashboard.Skills.show', compact('skill'));
    }

    public function delete($id)
    {
        $q = Skill::find($id);
        toast('top-right')->showCloseButton();
        Alert::success('Delete Done' ,$q->title. ' Deleted Successfully');
        $q->delete();
        return(redirect(route('skill')));
    }
}
