<?php

namespace Orkhanahmadov\ContentMigrations\Tests\Console;

use Illuminate\Support\Facades\DB;
use Orkhanahmadov\ContentMigrations\Tests\TestCase;

class MigrateCommandTest extends TestCase
{
    public function test_runs_migrations()
    {
        $this->artisan('make:content-migration', ['name' => self::MIGRATION_NAME]);
        $this->artisan('content-migrate')->assertExitCode(0);
        $this->assertCount(1, DB::table('content_migrations')->get());

        $this->artisan('content-migrate')->assertExitCode(0);
        $this->assertCount(1, DB::table('content_migrations')->get());
    }
}
