<?php

namespace Foolishdude\YoutubeTranscriptPhp\Formatters;

class TextFormatter implements FormatterInterface {
    public function format(array $transcripts): string {
        $formatted = "";
        foreach ($transcripts as $transcript) {
            $formatted .= $transcript['text'] . PHP_EOL;
        }
        return trim($formatted);
    }
}
