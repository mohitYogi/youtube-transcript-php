<?php

namespace Foolishdude\YoutubeTranscriptPhp;

use Foolishdude\YoutubeTranscriptPhp\Exceptions\{
    NoTranscriptFoundException,
    TranscriptNotFoundException
};
use Foolishdude\YoutubeTranscriptPhp\Utils\HtmlUnescaper;
use GuzzleHttp\Client;

class YouTubeTranscriptApi {
    private Client $client;

    public function __construct() {
        $this->client = new Client();
    }

    /**
     * Get the transcript for a video.
     *
     * @param string $videoId The YouTube video ID.
     * @param string $lang The language code for the transcript.
     * @return array The transcript data.
     * @throws NoTranscriptFoundException If no transcript is found.
     */
    public function getTranscript(string $videoId, string $lang = 'en'): array {
        try {
            $response = $this->client->get('https://www.youtube.com/api/timedtext', [
                'query' => [
                    'v' => $videoId,
                    'lang' => $lang
                ]
            ]);

            // Check if the response is a valid JSON
            $transcript = json_decode($response->getBody(), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new TranscriptNotFoundException("Invalid transcript data.");
            }

            // If transcript data is empty or malformed
            if (empty($transcript['events'])) {
                throw new NoTranscriptFoundException("No transcript found for video ID: $videoId in language $lang.");
            }

            // Unescape HTML entities in the transcript text
            foreach ($transcript['events'] as &$event) {
                if (isset($event['segs'])) {
                    foreach ($event['segs'] as &$seg) {
                        if (isset($seg['utf8'])) {
                            $seg['utf8'] = HtmlUnescaper::unescapeHtml($seg['utf8']);
                        }
                    }
                }
            }

            return $transcript['events'];  // Return the transcript events
        } catch (\Exception $e) {
            throw new NoTranscriptFoundException("Failed to fetch transcript: " . $e->getMessage());
        }
    }

    /**
     * Get all available languages for a video's transcript.
     *
     * @param string $videoId The YouTube video ID.
     * @return array The list of languages available for the transcript.
     * @throws NoTranscriptFoundException If no transcript data is available.
     */
    public function getAvailableLanguages(string $videoId): array {
        try {
            $response = $this->client->get('https://www.youtube.com/api/timedtext', [
                'query' => [
                    'v' => $videoId
                ]
            ]);

            $languages = json_decode($response->getBody(), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new TranscriptNotFoundException("Invalid language data.");
            }

            if (empty($languages)) {
                throw new NoTranscriptFoundException("No transcript languages found for video ID: $videoId.");
            }

            return $languages;
        } catch (\Exception $e) {
            throw new NoTranscriptFoundException("Failed to fetch available languages: " . $e->getMessage());
        }
    }
}
