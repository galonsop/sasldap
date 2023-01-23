<?php
/*
 *
 */

namespace SASLdap;

use Illuminate\Support\ServiceProvider;


class SASLdapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

}