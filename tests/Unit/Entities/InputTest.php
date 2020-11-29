<?php

declare(strict_types=1);

namespace P7v\Mrk\Tests\Unit\Entities;

use P7v\Mrk\Entities\Input;
use P7v\Mrk\Exceptions\FileNotFoundException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \P7v\Mrk\Entities\Input
 */
class InputTest extends TestCase
{
    /** @test */
    public function it_can_be_created_from_string()
    {
        $expectedInput = new Input('text');

        $this->assertEquals($expectedInput, Input::fromString('text'));
    }

    /** @test */
    public function it_can_be_created_from_file()
    {
        $expectedInput = new Input("text\n");

        $path = __DIR__ . '/../../testfile.md';
        $this->assertEquals($expectedInput, Input::fromFile($path));
    }

    /** @test */
    public function it_throws_an_exception_if_file_does_not_exist()
    {
        $expectedInput = new Input("text\n");

        $path = __DIR__ . '/../../notestfile.md';

        $this->expectException(FileNotFoundException::class);
        $this->expectExceptionMessage($path);

        $this->assertEquals($expectedInput, Input::fromFile($path));
    }
}
