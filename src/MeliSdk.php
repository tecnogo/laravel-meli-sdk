<?php

namespace Tecnogo\LaravelMeliSdk;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Traits\ForwardsCalls;
use Tecnogo\MeliSdk\Client;

/**
 * Class MeliSdk
 *
 * @package Tecnogo\LaravelMeliSdk
 */
final class MeliSdk
{
    use ForwardsCalls;

    /**
     * @var Application
     */
    private $app;
    /**
     * @var string
     */
    private $version;
    /**
     * @var Client
     */
    private $client;
    /**
     * @var array
     */
    private $config;

    /**
     * @param Application $app
     * @throws \Tecnogo\MeliSdk\Exception\ContainerException
     * @throws \Tecnogo\MeliSdk\Exception\MissingConfigurationException
     * @throws \Tecnogo\MeliSdk\Site\Exception\InvalidSiteIdException
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->version = $app->version();
        $this->config = $app['config']->get('laravel_meli_sdk');
        $this->client = new Client($this->config);
    }

    /**
     * Pass dynamic methods onto the router instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->forwardCallTo($this->client, $method, $parameters);
    }
}
