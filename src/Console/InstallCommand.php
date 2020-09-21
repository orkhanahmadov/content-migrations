<?php

namespace Orkhanahmadov\ContentMigrations\Console;

use Illuminate\Database\Console\Migrations\InstallCommand as Command;

class InstallCommand extends Command
{
    protected $name = 'content-migrate:install';

    protected $description = 'Create the content migration repository';
}
