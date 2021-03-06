<?php

namespace App\Http\Controllers;
use App\Models\Friend;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class friendController extends Controller
{
    public function friend(Request $request){
        $friend = new Friend();
        $friend->user1_id = $request->data->id;
        $friend->user2_id = $request->user2_id;
        $friend->save();
        return response()->success();
    }

    function friendRemove(Request $request){
        try{
            DB::table('friends')->where('user1_id',$request->data->id)->where('user2_id',$request->friend_id)->delete();
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
        return response()->success();
    }
}
