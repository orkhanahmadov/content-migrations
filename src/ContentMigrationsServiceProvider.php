<?php

namespace Orkhanahmadov\ContentMigrations;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\ServiceProvider;
use Orkhanahmadov\ContentMigrations\Console\InstallCommand;
use Orkhanahmadov\ContentMigrations\Console\MigrateCommand;
use Orkhanahmadov\ContentMigrations\Console\MigrateMakeCommand;

class ContentMigrationsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(InstallCommand::class, function ($app) {
            return new InstallCommand(new DatabaseMigrationRepository($app['db'], 'content_migrations'));
        });

        $this->app->singleton(MigrateCommand::class, function ($app) {
            return new MigrateCommand(
                new Migrator(
                    new DatabaseMigrationRepository($app['db'], 'content_migrations'),
                    $app['db'],
                    $app['files'],
                    $app['events']
                ),
                $app[Dispatcher::class]
            );
        });

        $this->app->singleton(MigrateMakeCommand::class, function ($app) {
            return new MigrateMakeCommand(
                new MigrationCreator(
                    $app['files'],
                    __DIR__ . DIRECTORY_SEPARATOR . 'Console' . DIRECTORY_SEPARATOR . 'stubs'
                ),
                $app['composer']
            );
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
             $this->commands([
                 InstallCommand::class,
                 MigrateCommand::class,
                 MigrateMakeCommand::class,
             ]);
        }
    }
}
