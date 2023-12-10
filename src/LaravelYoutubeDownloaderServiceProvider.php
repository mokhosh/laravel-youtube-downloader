<?php

namespace Mokhosh\LaravelYoutubeDownloader;

use Mokhosh\LaravelYoutubeDownloader\Commands\LaravelYoutubeDownloaderCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelYoutubeDownloaderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-youtube-downloader')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-youtube-downloader_table')
            ->hasCommand(LaravelYoutubeDownloaderCommand::class);
    }
}
