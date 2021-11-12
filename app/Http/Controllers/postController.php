<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\postRequest;

class postController extends Controller
{
    function post(postRequest $request){
        $request->validated();

        $data = DB::table('users')->where('remember_token',$request->remember_token)->get();
        // if (count($data) > 0){
    
            $path = $request->file('file')->store('post');
            $post = new Post();
            $post->file = $path;
            $post->access = $request->access;
            $post->user_id = $data[0]->id;
            $post->save();
            return response()->json(['msg' => 'your have post.....']);
        // }
        // else{
        //     return response()->json(['msg' => 'you are not login....']);
        // }
    }

    function postUpdate(postRequest $request){
        $request->validated();

        $data = DB::table('users')->where('remember_token',$request->remember_token)->get();
        // if (count($data) > 0){
            echo json_encode(['msg' => 'you are login']);
            $path = $request->file('file')->store('post');
            DB::table('posts')->where('user_id',$data[0]->id)->where('id',$request->post_id)->update(['file' => $path,'access' => $request->access]);
        // }
        // else{
        //     echo json_encode(['msg' => 'you are not login']);
        // }
    }

    function postDelete(Request $request){
        $data = DB::table('users')->where('remember_token',$request->remember_token)->get();
        // if (count($data) > 0){
            echo json_encode(['msg' => 'you are login']);
            DB::table('comments')->where('post_id',$request->post_id)->delete();
            DB::table('posts')->where('user_id',$data[0]->id)->where('id',$request->post_id)->delete();
            echo $data[0]->id.$request->post_id;
        // }
        // else{
        //     echo json_encode(['msg' => 'you are not login']);
        // }
    }
}
