<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'components.header', 'App\Http\ViewComposers\CategoryComposer'
        );
        View::composer(
            'components.banner', 'App\Http\ViewComposers\BannerComposer'
        );
        View::composer(
            'components.news', 'App\Http\ViewComposers\NewsComposer'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
