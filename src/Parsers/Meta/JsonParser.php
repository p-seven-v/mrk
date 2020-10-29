<?php

declare(strict_types=1);

namespace P7v\Mrk\Parsers\Meta;

class JsonParser implements MetaParser
{
    public function parse(string $meta): array
    {
        return json_decode($meta, true);
    }
}
