<?php

namespace App\Providers;

use App\Http\Controllers\converter\req\RequestToPostReqConverter;
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
        $this->app->singleton(
            \App\Services\PostService::class
        );

        $this->app->singleton(
            \App\Repositories\PostRepository::class
        );

        $this->app->singleton(
            RequestToPostReqConverter::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
