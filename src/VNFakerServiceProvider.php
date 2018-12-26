<?php

namespace Buihuycuong\Vnfaker;

use Illuminate\Support\ServiceProvider;

class VNFakerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require __DIR__.'/routes/routes.php';
        // require __DIR__.'/helpers.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('buihuycuong-vnfaker', function() {
        //     return new VNFaker();
        // });
    }
}
