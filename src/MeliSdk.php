<?php

namespace Tecnogo\LaravelMeliSdk;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\UrlGenerator;
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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->version = $app->version();
        $this->config = $this->digestConfig($app);
        $this->client = new Client($this->config);
    }

    /**
     * Pass dynamic methods onto the router instance.
     *
     * @param  string $method
     * @param  array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->forwardCallTo($this->client, $method, $parameters);
    }

    /**
     * @param Application $app
     * @return mixed $config
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function digestConfig(Application $app)
    {
        $config = $app['config']->get('laravel_meli_sdk');
        $urlGenerator = $app->make(\Illuminate\Contracts\Routing\UrlGenerator::class);

        $config['redirect_url'] = $urlGenerator->to($config['redirect_url'] ?? '');

        return $config;
    }
}
