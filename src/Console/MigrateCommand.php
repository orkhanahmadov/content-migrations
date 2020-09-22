<?php

namespace Orkhanahmadov\ContentMigrations\Console;

use Illuminate\Database\Console\Migrations\MigrateCommand as Command;

class MigrateCommand extends Command
{
    protected $signature = 'content-migrate';

    protected $description = 'Run the content migrations';

    public function handle()
    {
        $this->prepareDatabase();

        $this->migrator->setOutput($this->output)->run($this->getMigrationPaths());

        return 0;
    }

    protected function prepareDatabase()
    {
        if (! $this->migrator->repositoryExists()) {
            $this->call('content-migrate:install');
        }
    }

    protected function getMigrationPath()
    {
        return $this->laravel->databasePath() . DIRECTORY_SEPARATOR . 'content-migrations';
    }
}
