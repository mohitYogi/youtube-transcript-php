<?php

namespace Foolishdude\YoutubeTranscriptPhp\Tests\Utils;

use Foolishdude\YoutubeTranscriptPhp\Utils\HtmlUnescaper;
use PHPUnit\Framework\TestCase;

class HtmlUnescaperTest extends TestCase {
    public function testUnescapeHtml(): void {
        $input = "This &amp; that &lt;are&gt; examples &quot;of&quot; unescaping.";
        $expected = 'This & that <are> examples "of" unescaping.';
        $this->assertEquals($expected, HtmlUnescaper::unescapeHtml($input));
    }

    public function testUnescapeSpecialCharacters(): void {
        $input = "Pi &equals; &pi; or &#960;";
        $expected = "Pi = π or π";
        $this->assertEquals($expected, HtmlUnescaper::unescapeHtml($input));
    }

    public function testUnescapeWithNoEntities(): void {
        $input = "No special entities here!";
        $this->assertEquals($input, HtmlUnescaper::unescapeHtml($input));
    }
}
