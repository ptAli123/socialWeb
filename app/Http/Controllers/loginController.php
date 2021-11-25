<?php

namespace App\Http\Controllers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Service\JwtService;


class loginController extends Controller
{
    function login(Request $request){
        $data = DB::table('users')->where('email',$request->email)->get();
        if (Hash::check($request->password, $data[0]->password)){
            $jwt = JwtService::jwtToken();
            DB::table('users')->where('email',$request->email)->update(['remember_token' => $jwt]);
            echo JwtService::encodeJson($jwt);
        }
        else{
            return response()->json(["status"=>"your email and password is not Valid"]);
        }
    }


    function logout(Request $request){
        $data = DB::table('users')->where('remember_token',$request->remember_token)->update(['remember_token' => null]);
        return response()->json(["status"=>"you are successfully logout"]);
    }
}
