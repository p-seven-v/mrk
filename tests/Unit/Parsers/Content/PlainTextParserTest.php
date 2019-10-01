<?php

declare(strict_types=1);

namespace P7v\Mrk\Tests\Unit\Parsers\Content;

use P7v\Mrk\Parsers\Content\PlainTextParser;
use PHPUnit\Framework\TestCase;

class PlainTextParserTest extends TestCase
{
    /** @test */
    public function it_can_parse()
    {
        $this->assertEquals(
            'Hello Plain text.',
            (new PlainTextParser())->parse('Hello Plain text.')
        );
    }
}
