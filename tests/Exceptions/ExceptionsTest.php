<?php

namespace Foolishdude\YoutubeTranscriptPhp\Tests\Exceptions;

use Foolishdude\YoutubeTranscriptPhp\Exceptions\{
    YoutubeTranscriptException,
    NoTranscriptFoundException,
    TooManyRequestsException,
    TranscriptNotFoundException
};
use PHPUnit\Framework\TestCase;

class ExceptionsTest extends TestCase
{
    public function testYoutubeTranscriptException(): void
    {
        $this->expectException(YoutubeTranscriptException::class);
        $this->expectExceptionMessage("Generic YouTube Transcript error");
        $this->expectExceptionCode(0);

        throw new YoutubeTranscriptException("Generic YouTube Transcript error");
    }

    public function testNoTranscriptFoundException(): void
    {
        $this->expectException(NoTranscriptFoundException::class);
        $this->expectExceptionMessage("No transcript found.");
        $this->expectExceptionCode(404);

        throw new NoTranscriptFoundException();
    }

    public function testTooManyRequestsException(): void
    {
        $this->expectException(TooManyRequestsException::class);
        $this->expectExceptionMessage("Too many requests to the YouTube API.");
        $this->expectExceptionCode(429);

        throw new TooManyRequestsException();
    }

    public function testTranscriptNotFoundException(): void
    {
        $this->expectException(TranscriptNotFoundException::class);
        $this->expectExceptionMessage("Requested transcript not found.");
        $this->expectExceptionCode(404);

        throw new TranscriptNotFoundException();
    }
}
