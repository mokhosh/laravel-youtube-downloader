<?php

namespace Mokhosh\LaravelYoutubeDownloader\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Mokhosh\LaravelYoutubeDownloader\LaravelYoutubeDownloaderServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Mokhosh\\LaravelYoutubeDownloader\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelYoutubeDownloaderServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-youtube-downloader_table.php.stub';
        $migration->up();
        */
    }
}
