<?php

declare(strict_types=1);

namespace P7v\Mrk\Tests\Unit\Parsers\Meta;

use P7v\Mrk\Parsers\Meta\JsonParser;
use PHPUnit\Framework\TestCase;

class JsonParserTest extends TestCase
{
    /** @var JsonParser */
    private $subject;

    protected function setUp()
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

    public function dataProvider(): array
    {
        return [
            ['{}', []],
            ['{"foo":"bar"}', ['foo' => 'bar']],
            ['{"foo": "bar"}', ['foo' => 'bar']],
            ['{"foo": "bar", "xyz": "pro"}', ['foo' => 'bar', 'xyz' => 'pro']],
            ['{"foo": "bar", "xyz": "pro", "num": 365}', ['foo' => 'bar', 'xyz' => 'pro', 'num' => 365]],
        ];
    }
}
