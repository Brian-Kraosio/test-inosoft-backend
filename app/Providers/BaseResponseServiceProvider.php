<?php

namespace App\Providers;

use App\Classes\BaseResponse\BaseResponseFactory;
use Illuminate\Support\ServiceProvider;

class BaseResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('base-response', function (){
            return new BaseResponseFactory();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
