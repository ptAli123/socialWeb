<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function comment(Request $request){
        $data = DB::table('users')->where('remember_token',$request->remember_token)->get();
        if (count($data) > 0){
            echo json_encode(['msg' => 'you are login']);
            $path = $request->file('file')->store('comment');
            $comment = new Comment();
            $comment->comment = $request->comment;
            $comment->file = $path;
            $comment->user_id = $data[0]->id;
            $comment->post_id = $request->post_id;
            $comment->save();
        }
        else{
            echo json_encode(['msg' => 'you are not login']);
        }
    } 

    function commentUpdate(Request $request){
        $data = DB::table('users')->where('remember_token',$request->remember_token)->get();
        if (count($data) > 0){
            echo json_encode(['msg' => 'you are login']);
            $path = $request->file('file')->store('comment');
            DB::table('comments')->where('user_id',$data[0]->id)->where('post_id',$request->post_id)->where('id',$request->comment_id)->update(['file' => $path,'comment' => $request->comment]);
        }
        else{
            echo json_encode(['msg' => 'you are not login']);
        }
    }
}
