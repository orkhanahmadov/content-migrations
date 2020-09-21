# Laravel Content Migrations

[![Latest Stable Version](https://poser.pugx.org/orkhanahmadov/content-migrations/v/stable)](https://packagist.org/packages/orkhanahmadov/content-migrations)
[![Latest Unstable Version](https://poser.pugx.org/orkhanahmadov/content-migrations/v/unstable)](https://packagist.org/packages/orkhanahmadov/content-migrations)
[![Total Downloads](https://img.shields.io/packagist/dt/orkhanahmadov/content-migrations)](https://packagist.org/packages/orkhanahmadov/content-migrations)
[![License](https://img.shields.io/github/license/orkhanahmadov/content-migrations.svg)](https://github.com/orkhanahmadov/content-migrations/blob/master/LICENSE.md)

[![Build Status](https://img.shields.io/travis/orkhanahmadov/content-migrations.svg)](https://travis-ci.org/orkhanahmadov/content-migrations)
[![Test Coverage](https://api.codeclimate.com/v1/badges/3d5f8ef41004f128df8a/test_coverage)](https://codeclimate.com/github/orkhanahmadov/content-migrations/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/3d5f8ef41004f128df8a/maintainability)](https://codeclimate.com/github/orkhanahmadov/content-migrations/maintainability)
[![Quality Score](https://img.shields.io/scrutinizer/g/orkhanahmadov/content-migrations.svg)](https://scrutinizer-ci.com/g/orkhanahmadov/content-migrations)
[![StyleCI](https://github.styleci.io/repos/197324305/shield?branch=master)](https://github.styleci.io/repos/197324305)

Package simplifies having content based migrations separate from Laravel's migrations.

## Why?

Using migrations to insert/update/delete content comes very handy to automate the process. But using Laravel's migrations have some drawback:

* Laravel's migrations are not meant for content management, it is meant for database structure changes
* Managing content with migrations is hard. Database structure changes easily get mixed content changes, when you have more and more migrations, it becomes hard to track which of them are doing database structure changes and which of them manages content
* Recent introduction of "migration squashing" in Laravel 8 copies last state of database structure but not content. This means if you have content-based migrations you need to migrate them again one-by-one

This package aims to solve above problem by having content-based migrations separate from usual Laravel migrations.

## Requirements

* PHP 7.2 or above
* Laravel 6 or above 

## Installation

You can install the package via composer:

```bash
composer require orkhanahmadov/content-migrations
```

## Usage

``` php

```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email orkhan@fastmail.com instead of using the issue tracker.

## Credits

- [Orkhan Ahmadov](https://github.com/orkhanahmadov)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
