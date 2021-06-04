<?php

declare(strict_types=1);

namespace P7v\Mrk\Parsers\Content;

use Parsedown;

class ParsedownParser implements ContentParser
{
    private Parsedown $parsedown;

    public function __construct(Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }

    public function parse(string $content): string
    {
        return (string)$this->parsedown->text($content);
    }
}
