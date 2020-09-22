<?php

namespace Orkhanahmadov\ContentMigrations\Console;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand as Command;
use Illuminate\Support\Str;

class MigrateMakeCommand extends Command
{
    protected $signature = 'make:content-migration {name : The name of the content migration}';

    protected $description = 'Create a new content migration file';

    public function handle()
    {
        $name = Str::snake(trim($this->input->getArgument('name')));

        $this->writeMigration($name);

        $this->composer->dumpAutoloads();
    }

    protected function writeMigration($name, $table = null, $create = null)
    {
        // Needed for Laravel 6 and 7 support. Laravel 8 handles creating folder automatically
        // @codeCoverageIgnoreStart
        if (! file_exists(database_path() . DIRECTORY_SEPARATOR . 'content-migrations')) {
            mkdir(database_path() . DIRECTORY_SEPARATOR . 'content-migrations');
        }
        // @codeCoverageIgnoreEnd

        $file = $this->creator->create(
            $name,
            $this->laravel->databasePath() . DIRECTORY_SEPARATOR . 'content-migrations'
        );

        $this->line("<info>Created Content Migration:</info> {$file}");
    }
}
