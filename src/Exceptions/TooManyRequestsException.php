<?php

namespace Foolishdude\YoutubeTranscriptPhp\Exceptions;

/**
 * Exception thrown when too many requests are made to the YouTube API.
 */
class TooManyRequestsException extends YoutubeTranscriptException
{
    public function __construct($message = "Too many requests to the YouTube API.", $code = 429, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
