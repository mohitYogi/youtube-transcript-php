<?php

namespace Foolishdude\YoutubeTranscriptPhp\Tests\Formatters;

use Foolishdude\YoutubeTranscriptPhp\Formatters\JSONFormatter;
use PHPUnit\Framework\TestCase;

class JSONFormatterTest extends TestCase {
    public function testFormat(): void {
        $formatter = new JSONFormatter();
        $transcripts = [
            ['text' => 'Hello world', 'start' => 0.0, 'duration' => 1.5],
            ['text' => 'This is a test.', 'start' => 1.5, 'duration' => 2.0]
        ];
        $result = $formatter->format($transcripts);

        $expected = json_encode($transcripts, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $result);
    }
}
