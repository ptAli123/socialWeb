<?php

namespace App\Http\Controllers;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class friendController extends Controller
{
    public function friend(Request $request){
        $data = DB::table('users')->where('remember_token',$request->remember_token)->get();
        if (count($data) > 0){
            echo json_encode(['msg' => 'you are login']);
            $friend = new Friend();
            $friend->user1_id = $data[0]->id;
            $friend->user2_id = $request->user2_id;
            $friend->save();
        }
        else{
            echo json_encode(['msg' => 'you are not login']);
        }
    }
}
