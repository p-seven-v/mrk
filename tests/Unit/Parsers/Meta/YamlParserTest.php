<?php

declare(strict_types=1);

namespace P7v\Mrk\Tests\Unit\Parsers\Meta;

use P7v\Mrk\Parsers\Meta\YamlParser;
use PHPUnit\Framework\TestCase;

class YamlParserTest extends TestCase
{
    /** @var YamlParser */
    private $subject;

    protected function setUp(): void
    {
        $this->subject = new YamlParser();
    }

    /**
     * @test
     * @param string $meta
     * @param array $expected
     * @dataProvider dataProvider
     */
    public function it_can_parse(string $meta, array $expected)
    {
        $this->assertEquals($expected, $this->subject->parse($meta));
    }

    public function dataProvider(): array
    {
        return [
            ['foo: bar', ['foo' => 'bar']],
            ['foo:  bar', ['foo' => 'bar']],
            ["foo: bar\nxyz: por", ['foo' => 'bar', 'xyz' => 'por']],
        ];
    }
}
