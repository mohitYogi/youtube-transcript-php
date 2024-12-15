<?php

use PHPUnit\Framework\TestCase;
use YourVendor\YouTubeTranscript\TranscriptAPI;

class TranscriptAPITest extends TestCase {
    public function testGetTranscript() {
        $api = new TranscriptAPI();
        $transcript = $api->getTranscript("valid_video_id");
        $this->assertIsArray($transcript);
    }
}
