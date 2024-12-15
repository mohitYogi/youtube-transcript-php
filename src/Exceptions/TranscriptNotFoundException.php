<?php

namespace Foolishdude\YoutubeTranscriptPhp\Exceptions;

/**
 * Exception thrown when the requested transcript is not available.
 */
class TranscriptNotFoundException extends YoutubeTranscriptException
{
    public function __construct($message = "Requested transcript not found.", $code = 404, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
