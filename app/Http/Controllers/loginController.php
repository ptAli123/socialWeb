<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Service\JwtService;
use Exception;

class loginController extends Controller
{
    function login(Request $request){
        try{
            $data = DB::table('users')->where('email',$request->email)->get();
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()],422);
        }

        if (Hash::check($request->password, $data[0]->password)){
            $jwt = JwtService::jwtToken();
            DB::table('users')->where('email',$request->email)->update(['remember_token' => $jwt]);
            echo JwtService::encodeJson($jwt);
        }
        else{
            $Response['message'] = "Wronge Credential";
            return response()->json($Response,404);
        }
    }


    function logout(Request $request){
        try{
            $data = DB::table('users')->where('remember_token',$request->remember_token)->update(['remember_token' => null]);
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
        return response()->json(["status"=>"you are successfully logout"]);
    }
}
