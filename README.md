# Solarium Service Provider
[![Build Status](https://img.shields.io/travis/dafiti/solarium-service-provider/master.svg?style=flat-square)](https://travis-ci.org/dafiti/solarium-service-provider)

A [Silex](https://github.com/silexphp/Silex) Service Provider for [Solarium](http://www.solarium-project.org).

## Instalation

```json
{
    "require": {
        "dafiti/solarium-service-provider": "dev-master"
    }
}
```

## Usage

```php
use Silex\Application;
use Dafiti\Silex\SolariumServiceProvider;

$app = new Application();
$app->register(new SolariumServiceProvider(), [
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
]);

$ping = $app['solarium']->createPing();
$result = $app['solarium']->ping($ping);
```

## License

MIT License
