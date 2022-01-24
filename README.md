# Lifx client

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A PHP client library for the Lifx HTTP api. 

## Install

Via Composer

``` bash
$ composer require ben-gibson/lifx-client
```

## Usage

Build the Lifx service.

``` php
$lifx = new Lifx(
    new \GuzzleHttp\Client(),
    new Configuration(
        'https://api.lifx.com',
        'v1',
        'my-token'
    ),
    new LightFactory()
);
```

Modify a single light.

``` php
$lights = $lifx->lights();

$light = $lights->connected()->current();

$light->turnOn();
$light->pickColour(Colour::red());
$light->maximumBrightness();

$lifx->update($light);
```

Modify all lights.

``` php
$state = new State(Power::on(), Brightness::maximum(), Colour::green());

$lifx->matchState(Selector::all(), $state);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Credits

- [Ben Gibson][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ben-gibson/lifx-client.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ben-gibson/lifx-client/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/ben-gibson/lifx-client.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/ben-gibson/lifx-client.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ben-gibson/lifx-client.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/ben-gibson/lifx-client
[link-travis]: https://travis-ci.org/ben-gibson/lifx-client
[link-scrutinizer]: https://scrutinizer-ci.com/g/ben-gibson/lifx-client/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/ben-gibson/lifx-client
[link-downloads]: https://packagist.org/packages/ben-gibson/lifx-client
[link-author]: https://github.com/ben-gibson
[link-contributors]: ../../contributors
