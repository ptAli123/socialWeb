<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\commentRequest;

class commentController extends Controller
{
    public function comment(commentRequest $request){
        $path = $request->file('file')->store('comment');
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->file = $path;
        $comment->user_id = $request->data->id;
        $comment->post_id = $request->post_id;
        $comment->save();
        return response()->json(['msg' => 'you have comment....']);
    } 

    function commentUpdate(commentRequest $request){
        $path = $request->file('file')->store('comment');
        DB::table('comments')->where('user_id',$request->data->id)->where('post_id',$request->post_id)->where('id',$request->comment_id)->update(['file' => $path,'comment' => $request->comment]);
        return response()->json(['msg' => 'you have updated your comment.']);
    }

    function commentDelete(Request $request){
        DB::table('comments')->where('user_id',$request->data->id)->where('id',$request->comment_id)->delete();
        return response()->json(['msg' => 'you have successfully Delete your Comment']);
    }
}
