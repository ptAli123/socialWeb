<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Resources\PostResources;
use Exception;

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
        try{
            $postArr = array();
            $posts = DB::table('posts')->where('access','public')->get();
            foreach($posts as $post){
                    $CArr = array();
                    $comments = DB::table('comments')->where('post_id',$post->id)->get();
                    foreach($comments as $comment){
                        $C = array(['file' =>$comment->file, 'comment'=> $comment->comment]);
                        $CArr[$comment->id] = $C;
                    }
                    $P = array(['file' =>$post->file, 'Access'=> $post->access],$CArr);
                    $postArr[$post->id] = $P;
            }

            // private posts
            $posts = DB::table('posts')->where('access','private')->get();
            foreach($posts as $post){
                    if ($this->checkFriend($request->data->id,$post->user_id)){
                        echo json_encode(['file' =>$post->file, 'Access'=> $post->access]);
                        $comments = DB::table('comments')->where('post_id',$post->id)->get();
                        $CArr = array();
                        foreach($comments as $comment){
                            $C = array(['file' =>$comment->file, 'comment'=> $comment->comment]);
                            $CArr[$comment->id] = $C;
                        }
                        $P = array(['file' =>$post->file, 'Access'=> $post->access],$CArr);
                        $postArr[$post->id] = $P;
                    }
                }
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }

        return new PostResources($postArr);
    }
}
