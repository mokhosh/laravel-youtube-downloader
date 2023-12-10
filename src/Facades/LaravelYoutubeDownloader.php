<?php

namespace Mokhosh\LaravelYoutubeDownloader\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mokhosh\LaravelYoutubeDownloader\LaravelYoutubeDownloader
 */
class LaravelYoutubeDownloader extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mokhosh\LaravelYoutubeDownloader\LaravelYoutubeDownloader::class;
    }
}
