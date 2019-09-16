<?php

declare(strict_types=1);

namespace P7v\Mrk\Parsers\Meta;

interface MetaParser
{
    public function parse(string $meta): array;
}
