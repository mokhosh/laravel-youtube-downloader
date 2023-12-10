# download youtube videos in your laravel applications (for personal and educational purposes of course)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mokhosh/laravel-youtube-downloader.svg?style=flat-square)](https://packagist.org/packages/mokhosh/laravel-youtube-downloader)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mokhosh/laravel-youtube-downloader/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mokhosh/laravel-youtube-downloader/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mokhosh/laravel-youtube-downloader/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mokhosh/laravel-youtube-downloader/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mokhosh/laravel-youtube-downloader.svg?style=flat-square)](https://packagist.org/packages/mokhosh/laravel-youtube-downloader)

## Installation

You can install the package via composer:

```bash
composer require mokhosh/laravel-youtube-downloader
```

## Usage

```php
use Mokhosh\Facades\LaravelYoutubeDownloader;

$videoId = LaravelYoutubeDownloader::getVideoIdFromUrl($youtubeUrl);
$video = LaravelYoutubeDownloader::getYoutubeVideoMeta($videoId);

$formats = $video->streamingData->formats;
$adaptiveFormats = $video->streamingData->adaptiveFormats;

$title = $video->videoDetails->title;
$short_description = $video->videoDetails->shortDescription;
$thumbnails = $video->videoDetails->thumbnail->thumbnails;
$thumbnail = end($thumbnails)->url;
$channel_id = $video->videoDetails->channelId;
$channel_name = $video->videoDetails->author;
$views = $video->videoDetails->viewCount;
$video_duration_in_seconds = $video->videoDetails->lengthSeconds;
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mo Khosh](https://github.com/mokhosh)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
