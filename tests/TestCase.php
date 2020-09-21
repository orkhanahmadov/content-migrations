<?php

namespace Orkhanahmadov\ContentMigrations\Tests;

use Orkhanahmadov\ContentMigrations\ContentMigrationsServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [ContentMigrationsServiceProvider::class];
    }
}
