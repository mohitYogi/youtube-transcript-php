<?php

namespace Foolishdude\YoutubeTranscriptPhp\Exceptions;

/**
 * Exception thrown when no transcript is found for a given video.
 */
class NoTranscriptFoundException extends YoutubeTranscriptException
{
    public function __construct($message = "No transcript found.", $code = 404, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
