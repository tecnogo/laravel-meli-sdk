<?php

namespace Tecnogo\LaravelMeliSdk;

use Tecnogo\LaravelMeliSdk\Commands\MeliSdkWarmupCacheCommand;

/**
 * Class ServiceProvider
 *
 * @package Tecnogo\LaravelMeliSdk
 */
final class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Publishes configuration file.
     *
     * @return  void
     */
    public function boot()
    {
        $this->publishesConfig();
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->registerCommands();
    }

    protected function publishesConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel_meli_sdk.php' => config_path('laravel_meli_sdk.php'),
        ], ['config', 'laravel_meli_sdk']);
    }

    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return  void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel_meli_sdk.php',
            'laravel_meli_sdk'
        );
    }

    /**
     * Registers package's commands
     */
    private function registerCommands()
    {
        $this->commands([
            MeliSdkWarmupCacheCommand::class
        ]);
    }
}
