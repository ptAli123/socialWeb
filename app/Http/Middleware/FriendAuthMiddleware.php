<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Http\Request;

class FriendAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = DB::table('users')->where('remember_token',$request->remember_token)->get();
        $D = DB::table('users')->where('id',$request->user2_id)->exists();
        if ($D == 1){
            $D2 = DB::table('friends')->where('user2_id',$request->user2_id)->where('user1_id',$data[0]->id)->exists();
            if ($D2 == 0){
                return $next($request);
            }
            else{
                return response()->json(["message" => "You are already Friends"]);
            }  
        }
        else{
            return response()->json(["message" => "Wronge Friend"], 500);
        }
    }
}
