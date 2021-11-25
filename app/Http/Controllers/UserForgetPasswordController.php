<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Http\Requests\forgetPasswordRequest;
use App\Jobs\QueueJob;
use Exception;
use App\Providers\ResponseServiceProvider;

class UserForgetPasswordController extends Controller
{
    public function forgetPasword(Request $request){
        $varify_token=rand(100,100000);
        try{
            DB::table('users')->where('email',$request->email)->update(['forget_password_varify_token' => $varify_token]);
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
        $details = [
            'title' => 'Forget password Mail',
            'link' => $varify_token
        ];

        try{
            $mail = new QueueJob($request->email,$details);
            dispatch($mail);
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
        return response()->json(['msg' => 'Mail send...']);
    }

    public function updatePassword(forgetPasswordRequest $request){
        try{
            $newPassword = hash::make($request->password);
            DB::table('users')->where('forget_password_varify_token',$request->password_token)->update(['password' => $newPassword]);
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
        return response()->json(['msg' => 'Your password has Successfully Updated.']);
    }
}
