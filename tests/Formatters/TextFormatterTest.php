<?php

namespace Foolishdude\YoutubeTranscriptPhp\Tests\Formatters;

use Foolishdude\YoutubeTranscriptPhp\Formatters\TextFormatter;
use PHPUnit\Framework\TestCase;

class TextFormatterTest extends TestCase
{
    public function testFormat(): void
    {
        $formatter = new TextFormatter();
        $transcripts = [
            ['text' => 'Hello world', 'start' => 0.0, 'duration' => 1.5],
            ['text' => 'This is a test.', 'start' => 1.5, 'duration' => 2.0]
        ];
        $result = $formatter->format($transcripts);

        $expected = "Hello world" . PHP_EOL . "This is a test.";
        $this->assertEquals($expected, $result);
    }
}
