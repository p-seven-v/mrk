<?php

declare(strict_types=1);

namespace P7v\Mrk;

use P7v\Mrk\Entities\Document;
use P7v\Mrk\Entities\Input;
use P7v\Mrk\Parsers\Content\ContentParser;
use P7v\Mrk\Parsers\Meta\MetaParser;

class Parser
{
    private const PATTERN = '/\s+={3,}\s+/';

    private ContentParser $contentParser;

    private MetaParser $metaParser;

    public function __construct(ContentParser $contentParser, MetaParser $metaParser)
    {
        $this->contentParser = $contentParser;
        $this->metaParser = $metaParser;
    }

    public function parse(Input $input): Document
    {
        [$meta, $content] = $this->split((string)$input);

        return new Document(
            (string)$input,
            $this->parseMetadata($meta),
            $this->parseContent($content)
        );
    }

    /**
     * @return array{string, string}
     */
    private function split(string $input): array
    {
        return preg_split(self::PATTERN, $input, 2);
    }

    /**
     * @return array<mixed>
     */
    private function parseMetadata(string $meta): array
    {
        return $this->metaParser->parse($meta);
    }

    private function parseContent(string $content): string
    {
        return $this->contentParser->parse($content);
    }
}
