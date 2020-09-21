<?php

namespace Orkhanahmadov\ContentMigrations\Tests\Console;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Orkhanahmadov\ContentMigrations\Tests\TestCase;

class MigrateMakeCommandTest extends TestCase
{
    public function test_generates_migration_file()
    {
        $this->artisan('make:content-migration', ['name' => 'add_new_content'])->assertExitCode(0);

        $files = Collection::make(scandir(database_path() . '/content-migrations/'))
            ->filter(function ($file) {
                return Str::endsWith($file, '.php');
            });

        $this->assertCount(1, $files);
        $this->assertTrue((bool) strpos($files->first(), 'add_new_content'));
    }
}
