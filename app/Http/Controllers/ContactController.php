<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\NewContact;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class ContactController extends Controller
{
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();

        Mail::send(
            'Contact.contact_email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'user_message' => $request->get('message'),
            ),
            function ($message) use ($request) {
                $message->from($request->email);
                $message->to('abanob.ayad.2015@gmail.com');
            }
        );

        // $data = [
        //     'user_name' => $request->name,
        //     'user_email' =>$request->email,
        //     'con_subject' => $request->subject,
        //     'con_message' => $request->message,
        //     'date' => $contact->created_at,
        // ];
        // // event(new NewNotification($data));

        //Notification part start
        $users = User::all();
        $details = [
            'user_name' => $request->name,
            'user_email' => $request->email,
            'con_subject' => $request->subject,
            'con_message' => $request->message,
            'con_id' => $contact->id,
            'title' => 'New Contact',
            'body' => $request->name . ' trying for contact you with e-mail: ' . $request->email,
        ];
        FacadesNotification::send($users, new NewContact($details));
        //notification part end

        // Alert::success('Contact Completed', 'Category Changed Successfully');
        toast('top-right')->showCloseButton();
        Alert::success('Thank you for contacting!');
        return back();
    }


    public function index(Request $request)
    {

        $contacts = Contact::select()->orderBy('created_at', 'desc')->paginate(10);


        return view('Dashboard.Contacts.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('Dashboard.Contacts.show', compact('contact'));
    }


    public function delete($id)
    {
        $q = Contact::find($id);
        toast('top-right')->showCloseButton();
        Alert::success('Delete Done', $q->name . '\'s Contact Deleted Successfully');
        $q->delete();
        return (redirect(route('contact')));
    }
}
