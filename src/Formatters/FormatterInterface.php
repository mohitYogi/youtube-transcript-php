<?php

namespace Foolishdude\YoutubeTranscriptPhp\Formatters;

interface FormatterInterface {
    public function format(array $transcripts): string;
}
