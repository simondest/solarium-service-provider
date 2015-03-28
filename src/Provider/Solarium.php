<?php

namespace Service\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Solarium\Client;

class Solarium implements ServiceProviderInterface
{
    /**
     * @var string
     */
    private $prefix = 'solarium';

    public function register(Application $app)
    {
        $paramKey = sprintf('%s.config', $this->prefix);

        if (!isset($app[$paramKey])) {
            $app[$paramKey] = [];
        }

        $app[$this->prefix] = $app->share(
            function () use ($app) {
                return new Client($app['solarium.config']);
            }
        );
    }

    public function boot(Application $app)
    {
    }
}
