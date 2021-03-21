<?php

declare(strict_types=1);

namespace P7v\Mrk\Parsers\Meta;

use JsonException;

class JsonParser implements MetaParser
{
    /**
     * @return array<mixed>
     *
     * @throws JsonException
     */
    public function parse(string $meta): array
    {
        $decoded = json_decode($meta, true, 512, JSON_THROW_ON_ERROR);

        assert(is_array($decoded));

        return $decoded;
    }
}
