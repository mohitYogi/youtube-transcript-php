<?php

namespace Foolishdude\YoutubeTranscriptPhp\Exceptions;

use Exception;

/**
 * Base exception class for all YouTube Transcript-related exceptions.
 */
class YoutubeTranscriptException extends Exception
{
    /**
     * Constructor for the exception.
     *
     * @param string $message The exception message.
     * @param int $code The exception code.
     * @param \Throwable|null $previous The previous exception.
     */
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
