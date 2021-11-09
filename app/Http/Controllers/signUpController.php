<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class signUpController extends Controller
{   
    function signUp(Request $request){
        // $request->validate([
        //     "name" => "required | string",
        //     "email" => "required | Email",
        //     "password" => "required | min:6",
        //     "gender" => "required | string" 
        // ]);
        $varify_token=rand(100,100000);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = hash::make($request->password);
        $user->gender = $request->gender;
        $user->varify_token = $varify_token;
        $user->status = 1;
        $user->save();
        $details = [
            'title' => 'confirmation Mail',
            'link' => 'http://127.0.0.1:8000/api/mail-confirmation/'.$request->email.'/'.$varify_token
        ];
        Mail::to($request->email)->send(new SendMail($details));
        return "mail send....";

    }
}
