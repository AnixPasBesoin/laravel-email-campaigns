**THIS PACKAGE IS STILL IN DEVELOPMENT, DO NOT USE YET**

# Send email campaigns in Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-mass-mailing.svg?style=flat-square)](https://packagist.org/packages/spatie/:package_name)
[![Build Status](https://img.shields.io/travis/spatie/laravel-mass-mailing/master.svg?style=flat-square)](https://travis-ci.org/spatie/:package_name)
[![Quality Score](https://img.shields.io/scrutinizer/g/spatie/laravel-mass-mailing.svg?style=flat-square)](https://scrutinizer-ci.com/g/spatie/:package_name)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-mass-mailing.svg?style=flat-square)](https://packagist.org/packages/spatie/:package_name)


```php
$campaign = EmailCampaign::create([
    'subject' => 'My newsletter #1',
    'text' => $content,
    'track_opens' => true,
    'track_clicks' => true,
])->send();

EmailCampaign::create()
    ->subject('My newsletter #1')
    ->trackOpens()
    ->trackClicks()
    ->sendTo($list)
```

## Installation

You can install the package via composer:

```bash
composer require spatie/laravel-mass-mailing
```

## Usage

``` php
$skeleton = new Spatie\EmailCampaigns();
echo $skeleton->echoPhrase('Hello, Spatie!');
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email freek@spatie.be instead of using the issue tracker.

## Postcardware

You're free to use this package, but if it makes it to your production environment we highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using.

Our address is: Spatie, Samberstraat 69D, 2060 Antwerp, Belgium.

We publish all received postcards [on our company website](https://spatie.be/en/opensource/postcards).

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)
- [All Contributors](../../contributors)

## Support us

Spatie is a webdesign agency based in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://spatie.be/opensource).

Does your business depend on our contributions? Reach out and support us on [Patreon](https://www.patreon.com/spatie). 
All pledges will be dedicated to allocating workforce on maintenance and new awesome stuff.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
