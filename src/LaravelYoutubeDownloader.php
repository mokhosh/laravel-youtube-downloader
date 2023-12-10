<?php

namespace Mokhosh\LaravelYoutubeDownloader;

class LaravelYoutubeDownloader
{
    public function getVideoIdFromUrl($videoUrl)
    {
        preg_match(
            '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
            $videoUrl,
            $match
        );

        return $match[1];
    }

    public function getYoutubeVideoMeta($videoId)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.youtube.com/youtubei/v1/player');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->getCurlPostData($videoId));
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $result = curl_exec($ch);
        $error = curl_errno($ch);

        curl_close($ch);

        if ($error) {
            throw new \Exception(curl_error($ch));
        }

        return json_decode($result);
    }

    protected function getCurlPostData($videoId)
    {
        return <<<JSON
        {
            "context": {
                "client": {
                    "hl": "en",
                    "clientName": "WEB",
                    "clientVersion": "2.20210721.00.00",
                    "clientFormFactor": "UNKNOWN_FORM_FACTOR",
                    "clientScreen": "WATCH",
                    "mainAppWebInfo": {
                        "graftUrl": "/watch?v=' . $videoId . '"
                    }
                },
                "user": {
                    "lockedSafetyMode": false
                },
                "request": {
                    "useSsl": true,
                    "internalExperimentFlags": [],
                    "consistencyTokenJars": []
                }
            },
            "videoId": $videoId,
            "playbackContext": {
                "contentPlaybackContext": {
                    "vis": 0,
                    "splay": false,
                    "autoCaptionsDefaultOn": false,
                    "autonavState": "STATE_NONE",
                    "html5Preference": "HTML5_PREF_WANTS",
                    "lactMilliseconds": "-1"
                }
            },
            "racyCheckOk": false,
            "contentCheckOk": false
        }
        JSON;
    }
}
