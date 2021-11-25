<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\postRequest;
use App\Http\Resources\PostResources;
use Exception;

class postController extends Controller
{
    function post(postRequest $request){
        $path = $request->file('file')->store('post');
        $post = new Post();
        $post->file = $path;
        $post->access = $request->access;
        $post->user_id = $request->data->id;
        $post->save();
        return response()->success();
    }

    function postUpdate(postRequest $request){


        $path = $request->file('file')->store('post');
        try{
            DB::table('posts')->where('user_id',$request->data->id)->where('id',$request->post_id)->update(['file' => $path,'access' => $request->access]);
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
        return response()->success();
    }

    function postDelete(Request $request){
        try{
            DB::table('comments')->where('post_id',$request->post_id)->delete();
            DB::table('posts')->where('user_id',$request->data->id)->where('id',$request->post_id)->delete();
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
        return response()->success();
    }

    function checkFriend($user1_id,$user2_id){
        try{
            $data = DB::table('friends')->where('user1_id',$user1_id)->where('user2_id',$user2_id)->get();
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
        if (count($data) > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function postSearch(Request $request){
        try{
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
                    return new PostResources($P);
                }
            }
        }
        catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
    }
}
