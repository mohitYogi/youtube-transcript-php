<?php

namespace YourVendor\YouTubeTranscript;

use GuzzleHttp\Client;
use YourVendor\YouTubeTranscript\Exceptions\TranscriptNotFoundException;

class TranscriptAPI {
    private $client;

    public function __construct() {
        $this->client = new Client(['base_uri' => 'https://www.youtube.com/']);
    }

    public function getTranscript(string $videoId): array {
        $response = $this->client->get("api/timedtext", [
            'query' => [
                'v' => $videoId,
                'lang' => 'en', // Default to English
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new TranscriptNotFoundException("Transcript not found for video: $videoId");
        }

        $transcriptData = json_decode($response->getBody(), true);
        return $transcriptData; // Customize parsing as needed
    }
}
