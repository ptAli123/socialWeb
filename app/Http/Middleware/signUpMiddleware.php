<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class signUpMiddleware
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
            $data = DB::table('users')->where('email',$request->email)->exists();
        }catch(Exception $ex){
            return response()->json(['msg' => $ex->getMessage()]);
        }
        if ($data){
            return response()->json(["message" => "Wronge Credentials"], 404);
        }
        else{
            return $next($request);
        }
    }
}
