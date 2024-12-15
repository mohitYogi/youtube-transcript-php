<?php

namespace Foolishdude\YoutubeTranscriptPhp\Tests\Formatters;

use Foolishdude\YoutubeTranscriptPhp\Formatters\FormatterFactory;
use Foolishdude\YoutubeTranscriptPhp\Formatters\JSONFormatter;
use Foolishdude\YoutubeTranscriptPhp\Formatters\TextFormatter;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class FormatterFactoryTest extends TestCase {
    public function testCreateJsonFormatter(): void {
        $formatter = FormatterFactory::create('json');
        $this->assertInstanceOf(JSONFormatter::class, $formatter);
    }

    public function testCreateTextFormatter(): void {
        $formatter = FormatterFactory::create('text');
        $this->assertInstanceOf(TextFormatter::class, $formatter);
    }

    public function testInvalidFormatter(): void {
        $this->expectException(InvalidArgumentException::class);
        FormatterFactory::create('xml');
    }
}
