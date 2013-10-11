<?php namespace Raypower\Taobaoapi;

use Illuminate\Support\ServiceProvider;

class TaobaoapiServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        $this->package('raypower/taobaoapi');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['taobaoapi'] = $this->app->share(function ($app) {
            return new Taobaoapi();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('taobaoapi');
    }

}