<?php

declare(strict_types=1);

namespace P7v\Mrk\Parsers\Content;

class PlainTextParser implements ContentParser
{
    public function parse(string $content): string
    {
        return $content;
    }
}
