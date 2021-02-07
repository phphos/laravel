<?php

namespace PHPHos\Laravel\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

abstract class AppServiceProvider extends ServiceProvider
{
    /**
     * @inheritdoc
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
