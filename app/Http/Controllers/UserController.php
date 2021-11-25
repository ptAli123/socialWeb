<?php

namespace App\Http\Controllers;

use App\Http\Requests\userUpdateRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function userUpdate(userUpdateRequest $request){
        $data_to_update = [];
        foreach ($request->all() as $key => $value) {
            if (in_array($key, ['name', 'email', 'gender','password'])) {
                $data_to_update[$key]=$value;
            }
        }
        try{
            DB::table('users')->where('id',$request->data->id)->update($data_to_update);
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()],422);
        }
        return response()->success();
    }
}
