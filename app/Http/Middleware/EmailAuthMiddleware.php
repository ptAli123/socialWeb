<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailAuthMiddleware
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
        $data = DB::table('users')->where('email',$request->email)->exists();
        if ($data){
            return $next($request);
        }
        else{
            return response()->json(["message" => "Wronge Credentials"], 404);
        }
    }
}
