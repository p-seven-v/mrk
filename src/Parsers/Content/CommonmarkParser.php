<?php

declare(strict_types=1);

namespace P7v\Mrk\Parsers\Content;

use League\CommonMark\CommonMarkConverter;

class CommonmarkParser implements ContentParser
{
    private CommonMarkConverter $commonmark;

    public function __construct(CommonMarkConverter $commonmark = null)
    {
        $this->commonmark = $commonmark ?? new CommonMarkConverter();
    }

    public function parse(string $content): string
    {
        return $this->commonmark->convert($content)->getContent();
    }
}
