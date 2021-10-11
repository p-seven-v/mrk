<?php

declare(strict_types=1);

namespace P7v\Mrk\Tests\Unit\Parsers\Meta;

use P7v\Mrk\Parsers\Meta\JsonParser;
use PHPUnit\Framework\TestCase;

/**
 * @covers \P7v\Mrk\Parsers\Meta\JsonParser
 */
class JsonParserTest extends TestCase
{
    private JsonParser $subject;

    protected function setUp(): void
    {
        $this->subject = new JsonParser();
    }

    /**
     * @test
     * @param string $json
     * @param array $expected
     * @dataProvider dataProvider
     */
    public function it_can_parse(string $json, array $expected)
    {
        $this->assertEquals($expected, $this->subject->parse($json));
    }

    public function dataProvider(): iterable
    {
        yield ['{}', []];
        yield ['{"foo":"bar"}', ['foo' => 'bar']];
        yield ['{"foo": "bar"}', ['foo' => 'bar']];
        yield ['{"foo": "bar", "xyz": "pro"}', ['foo' => 'bar', 'xyz' => 'pro']];
        yield ['{"foo": "bar", "xyz": "pro", "num": 365}', ['foo' => 'bar', 'xyz' => 'pro', 'num' => 365]];
    }
}
