<?php

declare(strict_types=1);

namespace P7v\Mrk\Tests\Unit\Parsers\Meta;

use P7v\Mrk\Parsers\Meta\IniParser;
use PHPUnit\Framework\TestCase;

/**
 * @covers \P7v\Mrk\Parsers\Meta\IniParser
 */
class IniParserTest extends TestCase
{
    private IniParser $subject;

    protected function setUp(): void
    {
        $this->subject = new IniParser();
    }

    /**
     * @test
     * @param string $meta
     * @param array $expected
     *
     * @dataProvider dataProvider
     */
    public function it_can_parse(string $meta, array $expected): void
    {
        $this->assertEquals($expected, $this->subject->parse($meta));
    }

    public function dataProvider(): iterable
    {
        yield '2 values' => [
            "key=value\notherKey=otherValue\n",
            ['key' => 'value', 'otherKey' => 'otherValue'],
        ];

        yield '1 value' => [
            "key=value",
            ['key' => 'value'],
        ];

        yield 'no values' => [
            '',
            [],
        ];
    }
}
