<?php

namespace Foolishdude\YoutubeTranscriptPhp;

class Settings
{
    /**
     * Default headers used for HTTP requests to YouTube.
     */
    public const HEADERS = [
        'Accept' => 'application/json',
        'Accept-Language' => 'en-US,en;q=0.5',
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:102.0) Gecko/20100101 Firefox/102.0'
    ];

    /**
     * Base URL for YouTube transcript-related API calls.
     */
    public const BASE_URL = 'https://www.youtube.com/api/timedtext';
    public const WATCH_URL = "https://www.youtube.com/watch?v={video_id}";

    /**
     * Maximum number of retries for network requests.
     */
    public const MAX_RETRIES = 5;

    /**
     * Timeout for HTTP requests in seconds.
     */
    public const TIMEOUT = 10.0;
}
