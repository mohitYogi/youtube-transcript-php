<?php

namespace Foolishdude\YoutubeTranscriptPhp\Utils;

class HtmlUnescaper {
    /**
     * Decodes HTML entities into their corresponding characters.
     *
     * @param string $text The text containing HTML entities.
     * @return string The unescaped text.
     */
    public static function unescapeHtml(string $text): string {
        return html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}
