<?php

declare(strict_types=1);

namespace P7v\Mrk\Tests\Unit\Parsers\Content;

use P7v\Mrk\Parsers\Content\PlainTextParser;
use PHPUnit\Framework\TestCase;

/**
 * @covers \P7v\Mrk\Parsers\Content\PlainTextParser
 */
class PlainTextParserTest extends TestCase
{
    /** @test */
    public function it_can_parse(): void
    {
        $sut = new PlainTextParser();

        $this->assertEquals(
            'Hello Plain text.',
            $sut->parse('Hello Plain text.')
        );
    }
}
