<?php

declare(strict_types=1);

namespace P7v\Mrk\Parsers\Meta;

class IniParser implements MetaParser
{
    public function parse(string $meta): array
    {
        return parse_ini_string($meta);
    }
}
