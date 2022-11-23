<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\User;
use App\Notifications\NewHire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class HireController extends Controller
{
    public function save(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $hire = new Hire();

        $hire->email = $request->email;
        $hire->message = $request->message;

        $hire->save();

        Mail::send(
            'Contact.hire',
            array(
                'email' => $request->get('email'),
                'user_message' => $request->get('message'),
            ),
            function ($message) use ($request) {
                $message->from($request->email);
                $message->to('abanob.ayad.2015@gmail.com');
            }
        );

                //Notification part start
                $users = User::all();
                $details = [
                    'user_email' => $request->email,
                    'message' => $request->message,
                    'hire_id' => $hire->id,
                    'title' => 'New Hire',
                    'body' => $request->email . ' want to hire you!!' ,
                ];
                Notification::send($users, new NewHire($details));
                //notification part end


        // Alert::success('Contact Completed', 'Category Changed Successfully');
        toast('top-right')->showCloseButton();
        Alert::success('Thank you !');
        return back();
    }


    public function index(Request $request)
    {

        $hires = Hire::select()->orderBy('created_at', 'desc')->paginate(10);


        return view('Dashboard.Hire.index', compact('hires'));
    }

    public function show($id)
    {
        $hire = Hire::find($id);
        return view('Dashboard.Hire.show', compact('hire'));
    }

    public function delete($id)
    {
        $q = Hire::find($id);
        toast('top-right')->showCloseButton();
        Alert::success('Delete Done' ,$q->name. '\'s hire Deleted Successfully');
        $q->delete();
        return (redirect(route('hire')));
    }

}

