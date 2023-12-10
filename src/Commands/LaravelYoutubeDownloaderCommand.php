<?php

namespace Mokhosh\LaravelYoutubeDownloader\Commands;

use Illuminate\Console\Command;

class LaravelYoutubeDownloaderCommand extends Command
{
    public $signature = 'laravel-youtube-downloader';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
