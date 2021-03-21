<?php

declare(strict_types=1);

namespace P7v\Mrk\Parsers\Meta;

use Symfony\Component\Yaml\Yaml;

class YamlParser implements MetaParser
{
    public function parse(string $meta): array
    {
        $parsed = Yaml::parse($meta);

        assert(is_array($parsed));

        return $parsed;
    }
}
