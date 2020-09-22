# Laravel Content Migrations

[![Latest Stable Version](https://poser.pugx.org/orkhanahmadov/content-migrations/v/stable)](https://packagist.org/packages/orkhanahmadov/content-migrations)
[![Latest Unstable Version](https://poser.pugx.org/orkhanahmadov/content-migrations/v/unstable)](https://packagist.org/packages/orkhanahmadov/content-migrations)
[![Total Downloads](https://img.shields.io/packagist/dt/orkhanahmadov/content-migrations)](https://packagist.org/packages/orkhanahmadov/content-migrations)
[![License](https://img.shields.io/github/license/orkhanahmadov/content-migrations.svg)](https://github.com/orkhanahmadov/content-migrations/blob/master/LICENSE.md)

[![Build Status](https://img.shields.io/travis/orkhanahmadov/content-migrations.svg)](https://travis-ci.org/orkhanahmadov/content-migrations)
[![Test Coverage](https://api.codeclimate.com/v1/badges/5153c5e9c6ba6f6dff00/test_coverage)](https://codeclimate.com/github/orkhanahmadov/content-migrations/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/5153c5e9c6ba6f6dff00/maintainability)](https://codeclimate.com/github/orkhanahmadov/content-migrations/maintainability)
[![Quality Score](https://img.shields.io/scrutinizer/g/orkhanahmadov/content-migrations.svg)](https://scrutinizer-ci.com/g/orkhanahmadov/content-migrations)
[![StyleCI](https://github.styleci.io/repos/297263051/shield?branch=master)](https://github.styleci.io/repos/297263051?branch=master)

Package simplifies having content-based migrations separate from Laravel's migrations.

## Why?

Sometimes using migrations to manage content in database tables comes very handy to automate the content update process on all environments. Like adding new translations or updating products.

But using Laravel's own migrations for this purpose have some drawback:

* Laravel's migrations are not meant for content management, it is meant for database structure changes only.
* After some time it gets hard to manage and find content-based migrations among many migration files.
* Recent introduction of "migration squashing" in Laravel 8 copies last state of database structure only. This means if you have content-based migrations you need to find a way to migrate them again if you have an empty database.

This package aims to solve these problems by having dedicated content-based migrations separate from usual Laravel migrations.

## Requirements

* PHP **7.2** or above
* Laravel **6** or above 

## Installation

You can install the package via composer:

```bash
composer require orkhanahmadov/content-migrations
```

## Usage

To create content-based migration run `make:content-migration` artisan command and pass migration name:

``` shell script
php artisan make:content-migration add_new_translations
```

This will command will generate timestamp-based content migration inside `database/content-migrations` folder of your application.

Generated migration will have single `up()` method, you can use this method to insert/update/delete content in your database.

To migrate your content-based migrations, run:

``` shell script
php artisan content-migrate
```

This will behave the same way as Laravel's own `php artisan migrate` command, but this command will track processed migrations in `content_migrations` table, separate from Laravel's `migrations` table. 

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
