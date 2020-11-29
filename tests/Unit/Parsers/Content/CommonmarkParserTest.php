<?php

declare(strict_types=1);

namespace P7v\Mrk\Tests\Unit\Parsers\Content;

use League\CommonMark\CommonMarkConverter;
use P7v\Mrk\Parsers\Content\CommonmarkParser;
use PHPUnit\Framework\TestCase;

/**
 * @covers \P7v\Mrk\Parsers\Content\CommonmarkParser
 */
class CommonmarkParserTest extends TestCase
{
    /** @var CommonmarkParser */
    private $subject;

    protected function setUp()
    {
        $this->subject = new CommonmarkParser(new CommonMarkConverter());
    }

    /** @test */
    public function it_can_parse()
    {
        $this->assertEquals(
            "<h1>Hello World</h1>\n",
            $this->subject->parse('# Hello World')
        );
    }
}
