<?php

declare(strict_types=1);

namespace P7v\Mrk\Tests\Unit;

use P7v\Mrk\Entities\Document;
use P7v\Mrk\Entities\Input;
use P7v\Mrk\Parser;
use P7v\Mrk\Parsers\Content\ContentParser;
use P7v\Mrk\Parsers\Meta\MetaParser;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \P7v\Mrk\Parser
 */
class ParserTest extends TestCase
{
    /** @var ContentParser&MockObject */
    private ContentParser $contentParser;

    /** @var MetaParser&MockObject */
    private MetaParser $metaParser;

    private Parser $subject;

    protected function setUp(): void
    {
        $this->contentParser = $this->createMock(ContentParser::class);
        $this->metaParser = $this->createMock(MetaParser::class);
        $this->subject = new Parser($this->contentParser, $this->metaParser);
    }

    /** @test */
    public function it_properly_parses_document(): void
    {
        $text = "key=value\nname=alex\n ===\n #### What is \"Let's Encrypt\"?";

        $this->metaParser->expects($this->once())
            ->method('parse')
            ->with("key=value\nname=alex")
            ->willReturn([
                'key' => 'value',
                'name' => 'alex',
            ]);

        $this->contentParser->expects($this->once())
            ->method('parse')
            ->with('#### What is "Let\'s Encrypt"?')
            ->willReturn('<h4>What is "Let\'s Encrypt"?</h4>');

        $this->assertEquals(
            new Document(
                $text,
                [
                    'key' => 'value',
                    'name' => 'alex',
                ],
                '<h4>What is "Let\'s Encrypt"?</h4>'
            ),
            $this->subject->parse(Input::fromString($text))
        );
    }
}
