<?php

namespace App\Http\Controllers;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mailConfirmationController extends Controller
{
    function confirmed($email,$varify_token){
        try{
            DB::table('users')->where('email',$email)->where('varify_token',$varify_token)->update(['email_verified_at' => now()]);
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()],422);
        }

        return response()->success();
    }
}
