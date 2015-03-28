<?php

namespace Dafiti\Silex;

use Silex\Application;

class SolariumServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldRegister()
    {
        $app = new Application();
        $app->register(new SolariumServiceProvider());

        $this->assertInstanceOf('\Solarium\Client', $app['solarium']);
    }

    public function testShouldRegisterWithParams()
    {
        $params = [
            'solarium.config' => [
                'endpoint' => [
                    'localhost' => [
                        'host' => 'localhost',
                        'port' => 8983,
                        'path' => '/solr',
                        'core' => 'solr_test',
                    ],
                ],
            ],
        ];

        $app = new Application();
        $app->register(new SolariumServiceProvider(), $params);

        $expected = $params['solarium.config']['endpoint']['localhost'];
        $result   = $app['solarium']->getEndpoint('localhost');

        $this->assertEquals($expected['host'], $result->getHost());
        $this->assertEquals($expected['port'], $result->getPort());
        $this->assertEquals($expected['path'], $result->getPath());
        $this->assertEquals($expected['core'], $result->getCore());
    }
}
