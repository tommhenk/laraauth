<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\SaveEloquentOrm;
use App\Helpers\SaveFile;

class SaveStrServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('savestr', function() {
        // $this->app->bind('App\Helpers\Contracts\SaveStr', function() {
        // $this->app->singleton('SaveStr', function() {
            // return new SaveEloquentOrm();
            return new SaveFile();
        } );
        // $obj = new SaveFile();
        // $this->app->instance('App\Helpers\Contracts\SaveStr', $obj);
        // dd($this->app['App\Helpers\Contracts\SaveStr']);
        // dd($this->app->make('App\Helpers\Contracts\SaveStr'));

        // $this->app->bind('App\Helpers\Contracts\SaveStr', 'App\Helpers\SaveFile');
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
