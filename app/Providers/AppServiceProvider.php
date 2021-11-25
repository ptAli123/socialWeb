<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success',function($data,$status_code){
            return response()->json([
                'success' => true,
                'message' => $data['message']
            ],$status_code);

        });

        Response::macro('error',function($data, $status_code){
            return response()->json([
                'success' => false,
                'message' => $data['message'],
            ],$status_code);

        });
    }
}
