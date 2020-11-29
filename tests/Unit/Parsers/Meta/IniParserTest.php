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
    /** @var IniParser */
    private $subject;

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
    public function it_can_parse(string $meta, array $expected)
    {
        $this->assertEquals($expected, $this->subject->parse($meta));
    }

    public function dataProvider(): array
    {
        return [
            '2 values' => [
                "key=value\notherKey=otherValue\n",
                ['key' => 'value', 'otherKey' => 'otherValue'],
            ],
            '1 value' => [
                "key=value",
                ['key' => 'value'],
            ],
            'no values' => [
                '',
                []
            ]
        ];
    }
}
