<?php

namespace Orkhanahmadov\ContentMigrations\Tests\Console;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Orkhanahmadov\ContentMigrations\Tests\TestCase;

class InstallCommandTest extends TestCase
{
    public function test_install_content_migrations_table()
    {
        $this->artisan('content-migrate:install');

        $this->assertCount(0, DB::table('content_migrations')->get());
    }

    public function test_throws_exception_if_command_is_not_run_yet()
    {
        $this->expectException(QueryException::class);
        $this->expectExceptionMessage('General error: 1 no such table: content_migrations (SQL: select * from "content_migrations"');

        DB::table('content_migrations')->get();
    }
}
