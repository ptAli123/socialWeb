<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class listViewController extends Controller
{
    function checkFriend($user1_id,$user2_id){
        $data = DB::table('friends')->where('user1_id',$user1_id)->where('user2_id',$user2_id)->get();
        if (count($data) > 0){
            return true;
        }
        else{
            return false;
        }
    }
    public function postList(Request $request){
        $data = DB::table('users')->where('remember_token',$request->remember_token)->get();
        if (count($data) > 0){
            echo json_encode(['msg' => 'you are login']);
           $posts = DB::table('posts')->where('access','public')->get();
           foreach($posts as $post){
                echo json_encode(['file' =>$post->file, 'Access'=> $post->access]);
                $comments = DB::table('comments')->where('post_id',$post->id)->get();
                foreach($comments as $comment){
                    echo json_encode(['file' =>$comment->file, 'comment'=> $comment->comment]);
                }
           }

           // private posts
           $posts = DB::table('posts')->where('access','private')->get();
           foreach($posts as $post){
                if ($this->checkFriend($data[0]->id,$post->user_id)){
                    echo json_encode(['file' =>$post->file, 'Access'=> $post->access]);
                    $comments = DB::table('comments')->where('post_id',$post->id)->get();
                    foreach($comments as $comment){
                        echo json_encode(['file' =>$comment->file, 'comment'=> $comment->comment]);
                    }
                }
            
            }
        }
        else{
            echo json_encode(['msg' => 'you are not login']);
        }
    }
}
