<?php

namespace Foolishdude\YoutubeTranscriptPhp\Formatters;

use InvalidArgumentException;

class FormatterFactory {
    public static function create(string $type): FormatterInterface {
        return match ($type) {
            'json' => new JSONFormatter(),
            'text' => new TextFormatter(),
            default => throw new InvalidArgumentException("Invalid formatter type: $type"),
        };
    }
}
