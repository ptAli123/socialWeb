<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\postRequest;

class postController extends Controller
{
    function post(postRequest $request){
        $path = $request->file('file')->store('post');
        $post = new Post();
        $post->file = $path;
        $post->access = $request->access;
        $post->user_id = $request->data->id;
        $post->save();
        return response()->json(['msg' => 'you have post.....']);
    }

    function postUpdate(postRequest $request){

            
        $path = $request->file('file')->store('post');
        DB::table('posts')->where('user_id',$request->data->id)->where('id',$request->post_id)->update(['file' => $path,'access' => $request->access]);
        return response()->json(['msg' => 'your have updated post.....']);
    }

    function postDelete(Request $request){
            DB::table('comments')->where('post_id',$request->post_id)->delete();
            DB::table('posts')->where('user_id',$request->data->id)->where('id',$request->post_id)->delete();
            return response()->json(['msg' => 'your have Deleted post.....']);
    }

    function checkFriend($user1_id,$user2_id){
        $data = DB::table('friends')->where('user1_id',$user1_id)->where('user2_id',$user2_id)->get();
        if (count($data) > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function postSearch(Request $request){

        //$data = DB::table('users')->where('remember_token',$request->remember_token)->get();
        $post = DB::table('posts')->where('id',$request->post_id)->get();
        if ($post[0]->access == 'public'){
                $CArr = array();
                $comments = DB::table('comments')->where('post_id',$post[0]->id)->get();
                foreach($comments as $comment){
                    
                    $C = array(['file' =>$comment->file, 'comment'=> $comment->comment]);
                    $CArr[$comment->id] = $C;
                }
                $P = array(['file' =>$post[0]->file, 'Access'=> $post[0]->access],$CArr);
                return response()->json($P);
        }
        else{
            if ($this->checkFriend($request->data->id,$post[0]->user_id)){
                $CArr = array();
                $comments = DB::table('comments')->where('post_id',$post[0]->id)->get();
                foreach($comments as $comment){
                    
                    $C = array(['file' =>$comment->file, 'comment'=> $comment->comment]);
                    $CArr[$comment->id] = $C;
                }
                $P = array(['file' =>$post[0]->file, 'Access'=> $post[0]->access],$CArr);
                return response()->json($P);
            }
        }
    }
}
