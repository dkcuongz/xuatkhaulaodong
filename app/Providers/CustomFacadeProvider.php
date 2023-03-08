<?php

namespace App\Providers;

use App\Facade\Src\TimeHelper;
use App\Facade\Src\CommonHelper;
use Illuminate\Support\ServiceProvider;

class CustomFacadeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('TimeHelperFacade', function () {
            return new TimeHelper();
        });

        $this->app->bind('CommonHelperFacade', function () {
            return new CommonHelper();
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
