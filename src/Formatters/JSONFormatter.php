<?php

namespace Foolishdude\YoutubeTranscriptPhp\Formatters;

class JSONFormatter implements FormatterInterface {
    public function format(array $transcripts): string {
        return json_encode($transcripts, JSON_PRETTY_PRINT);
    }
}
