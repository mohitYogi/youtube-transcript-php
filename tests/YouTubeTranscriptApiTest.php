<?php

namespace Foolishdude\YoutubeTranscriptPhp\Tests;

use Foolishdude\YoutubeTranscriptPhp\YouTubeTranscriptApi;
use Foolishdude\YoutubeTranscriptPhp\Exceptions\{
    NoTranscriptFoundException,
    TranscriptNotFoundException
};
use PHPUnit\Framework\TestCase;

class YouTubeTranscriptApiTest extends TestCase {
    public function testGetTranscriptSuccess(): void {
        $api = new YouTubeTranscriptApi();
        $transcript = $api->getTranscript('dQw4w9WgXcQ'); // Sample video ID
        $this->assertNotEmpty($transcript);
    }

    public function testGetTranscriptNoTranscriptFound(): void {
        $this->expectException(NoTranscriptFoundException::class);
        $api = new YouTubeTranscriptApi();
        $api->getTranscript('invalid_video_id');
    }

    public function testGetAvailableLanguagesSuccess(): void {
        $api = new YouTubeTranscriptApi();
        $languages = $api->getAvailableLanguages('dQw4w9WgXcQ'); // Sample video ID
        $this->assertContains('en', $languages); // Assuming English is available
    }

    public function testGetAvailableLanguagesNoLanguagesFound(): void {
        $this->expectException(NoTranscriptFoundException::class);
        $api = new YouTubeTranscriptApi();
        $api->getAvailableLanguages('invalid_video_id');
    }
}
