<?php

declare(strict_types=1);

namespace P7v\Mrk\Parsers\Content;

use League\CommonMark\CommonMarkConverter;

class CommonmarkParser implements ContentParser
{
    /** @var CommonMarkConverter */
    private $commonmark;

    public function __construct(CommonMarkConverter $commonmark)
    {
        $this->commonmark = $commonmark;
    }

    public function parse(string $content): string
    {
        return $this->commonmark->convertToHtml($content);
    }
}
