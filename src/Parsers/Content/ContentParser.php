<?php

declare(strict_types=1);

namespace P7v\Mrk\Parsers\Content;

interface ContentParser
{
    public function parse(string $content): string;
}
