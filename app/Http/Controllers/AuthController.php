<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function regView()
    {
        return view('Dashboard.Auth.register');
    }
    public function register(Request $request)
    {
        // $data = $request->validate(['name'=> 'required','email'=> 'required','password'=> 'required|integer','c_password'=> 'required|integer',]);

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect(route('reg'))->withErrors($validator)->withInput();
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['avatar'] = 'user.jpg';
        // dd($input);
        try {
            $user = User::create($input);
        } catch (\Throwable $th) {
            // throw $th;
            dd($th);
        }

        toast('Creation Done', 'success',  'top-right')->showCloseButton();
        Alert::success('Account Created Successfully');
        return redirect(route('home'))->with($messgae = 'Account Created Successfully');
    }

    public function login()
    {
        return view('Dashboard.Auth.login');
    }

    public function doLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:191|exists:users,email',
            'password' => 'required|string'
        ]);

        if (!auth()->attempt(['email' => $data['email'], 'password' => $data['password']], $request->remember)) {
            return back()->withErrors('Invalid Password')->withInput();
        } else {
            return redirect(route('home'));
        }
    }


    public function forgot()
    {
        return view('Dashboard.Auth.sendtoken');
    }

    public function doForgot(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:191|exists:users,email',
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert(
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]
        );

        $act_link = route('rest', ["token" => $token, "email" => $request->email]);
        $body = "Rest Your Password of Account on Abanoub Portfolio associated to  \"$request->email\"
                Press on the below to rest your password";
        Mail::send(
            "Dashboard.Auth.email-forgot",
            ["act_link" => $act_link, "body" => $body],
            function ($message) use ($request) {
                $message->from('abanob.ayad.2015@gmail.com', "Abanoub Ayad Portfolio");
                $message->to($request->email)->subject("Reset Password");
            }
        );

        toast('top-right')->showCloseButton();
        Alert::success('Reset Link Sent To Your Email Successfully !');

        return back()->with($status = "Reset Link Sent To Your Email Successfully");
        // return redirect(route('home'));
    }

    public function rest($t, $e)
    {
        $token = $t;
        $email = $e;
        return view('Dashboard.Auth.newpassword', compact('token', 'email'));
    }

    public function doRest(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:191|exists:users,email',
            'password' => 'required|min:5',
            'c_password' => 'required|same:password',
        ]);

        // dd($request->all());
        $check_token = DB::table('password_resets')->where(
            [
                'email'=> $request->email,
                'token'=> $request->token,
            ]
        )->first();
        // dd($check_token);

        if (!$check_token) {
            toast('top-right')->showCloseButton();
            Alert::error('Invalid Token');
            return back();
        }
        else
        {
            $user = User::where('email' , $request->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            try{
                DB::table('password_resets')->where(
                    [
                        'email'=> $request->email,
                        'token'=> $request->token,
                    ]
                )->delete();

                toast('top-right')->showCloseButton();
                Alert::success('Password Reset Successfully !');
            }
            catch(Exception){

                toast('top-right')->showCloseButton();
                Alert::error('Password Reset Successfully !');
            }
        }


        toast('top-right')->showCloseButton();
        Alert::success('Password Reset Successfully !');

        return redirect(route('login')) ;

        // return redirect(route('home'));
    }



    public function logout()
    {
        auth()->logout();
        return redirect(route('login'));
    }
}
