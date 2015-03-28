<?php

namespace Service\Provider;

use Silex\Application;

class SolariumTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldRegister()
    {
        $app = new Application();
        $app->register(new Solarium());

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
        $app->register(new Solarium(), $params);

        $expected = $params['solarium.config']['endpoint']['localhost'];
        $result   = $app['solarium']->getEndpoint('localhost');

        $this->assertEquals($expected['host'], $result->getHost());
        $this->assertEquals($expected['port'], $result->getPort());
        $this->assertEquals($expected['path'], $result->getPath());
        $this->assertEquals($expected['core'], $result->getCore());
    }
}
