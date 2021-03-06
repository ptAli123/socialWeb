<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Http\Requests\signUpRequest;
use App\Jobs\QueueJob;
use Exception;
use App\Providers\ResponseServiceProvider;

class signUpController extends Controller
{
    function signUp(signUpRequest $request){

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
        try{
            $mail = new QueueJob($request->email,$details);
            dispatch($mail);
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()],422);
        }
        $Response['message'] = "mail send....";
        return response()->json($Response,200);
    }
}
