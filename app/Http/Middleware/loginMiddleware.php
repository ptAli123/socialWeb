<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginMiddleware
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
            $data = DB::table('users')->where('remember_token',$request->remember_token)->get();
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
        if (count($data) > 0){
            return $next($request);
        }
        else{
            return response()->json(['msg' => 'you are not login']);
        }
    }
}
