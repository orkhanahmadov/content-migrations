<?php

namespace Orkhanahmadov\ContentMigrations\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Orkhanahmadov\ContentMigrations\ServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public const MIGRATION_NAME = 'add_new_content';

    protected function tearDown(): void
    {
        $this->deleteExistingMigrations();

        parent::tearDown();
    }

    protected function deleteExistingMigrations(): void
    {
        Collection::make(scandir(database_path() . '/content-migrations/'))
            ->filter(function ($file) {
                return Str::endsWith($file, '.php');
            })
            ->each(function ($file) {
                unlink(database_path() . '/content-migrations/' . $file);
            });
        sleep(1);
    }

    /**
     * Resolve application aliases.
     *
     * @param Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class
        ];
    }
}
