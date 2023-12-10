<?php

namespace Mokhosh\LaravelYoutubeDownloader;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mokhosh\LaravelYoutubeDownloader\Commands\LaravelYoutubeDownloaderCommand;

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
