# Solarium Service Provider
[![Build Status](https://img.shields.io/travis/dafiti/solarium-service-provider/master.svg?style=flat-square)](https://travis-ci.org/dafiti/solarium-service-provider)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/dafiti/solarium-service-provider/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/dafiti/solarium-service-provider/?branch=master)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/dafiti/solarium-service-provider/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/dafiti/solarium-service-provider/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/dafiti/solarium-service-provider.svg?style=flat-square)](https://packagist.org/packages/dafiti/solarium-service-provider)
[![Total Downloads](https://img.shields.io/packagist/dt/dafiti/solarium-service-provider.svg?style=flat-square)](https://packagist.org/packages/dafiti/solarium-service-provider)
[![License](https://img.shields.io/packagist/l/dafiti/solarium-service-provider.svg?style=flat-square)](https://packagist.org/packages/dafiti/solarium-service-provider)

A [Silex](https://github.com/silexphp/Silex) Service Provider for [Solarium](http://www.solarium-project.org).

## Instalation
The package is available on [Packagist](http://packagist.org/packages/dafiti/solarium-service-provider).
Autoloading is [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md) compatible.

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
