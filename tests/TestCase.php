<?php

namespace Orkhanahmadov\ContentMigrations\Tests;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Orkhanahmadov\ContentMigrations\ContentMigrationsServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function tearDown(): void
    {
        Collection::make(scandir(database_path() . '/content-migrations/'))
            ->filter(function ($file) {
                return Str::endsWith($file, '.php');
            })
            ->each(function ($file) {
                unlink(database_path() . '/content-migrations/' . $file);
            });

        parent::tearDown();
    }

    protected function getPackageProviders($app)
    {
        return [
            ContentMigrationsServiceProvider::class
        ];
    }
}
