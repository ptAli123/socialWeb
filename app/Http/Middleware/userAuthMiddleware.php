<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Http\Request;

class userAuthMiddleware
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
        try{
            $data = DB::table('users')->where('remember_token',$request->remember_token)->first();
            if ($data){
                return $next($request->merge(["data" => $data]));
            }
            else{
                return response()->json(['msg' => 'you are not login']);
            }
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
        
        
    }
}
