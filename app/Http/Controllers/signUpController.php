<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class signUpController extends Controller
{
    
    function signUp(Request $request){
        $request->validate([
            "name" => "required | string",
            "email" => "required | Email",
            "password" => "required | min:6",
            "gender" => "required | string" 
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = hash::make($request->password);
        $user->gender = $request->gender;
        $user->status = 0;
        $user->save();
    }
}
