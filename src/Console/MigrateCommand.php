<?php

namespace Orkhanahmadov\ContentMigrations\Console;

use Illuminate\Database\Console\Migrations\MigrateCommand as Command;

class MigrateCommand extends Command
{
    protected $signature = 'content-migrate {--database= : The database connection to use}
                {--schema-path= : The path to a schema dump file}
                {--pretend : Dump the SQL queries that would be run}';

    protected $description = 'Run the content migrations';

    public function handle()
    {
        $this->migrator->usingConnection($this->option('database'), function () {
            $this->prepareDatabase();

            $this->migrator->setOutput($this->output)->run($this->getMigrationPaths());
        });

        return 0;
    }

    protected function prepareDatabase()
    {
        if (! $this->migrator->repositoryExists()) {
            $this->call('content-migrate:install', array_filter([
                '--database' => $this->option('database'),
            ]));
        }

        if (method_exists($this->migrator, 'hasRunAnyMigrations') &&
            ! $this->migrator->hasRunAnyMigrations() &&
            ! $this->option('pretend')) {
            $this->loadSchemaState();
        }
    }

    protected function getMigrationPath()
    {
        return $this->laravel->databasePath() . DIRECTORY_SEPARATOR . 'content-migrations';
    }
}
