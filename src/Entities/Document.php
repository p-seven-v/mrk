<?php

declare(strict_types=1);

namespace P7v\Mrk\Entities;

class Document
{
    private string $raw;

    private array $meta;

    private string $content;

    public function __construct(string $raw, array $meta, string $content)
    {
        $this->raw = $raw;
        $this->meta = $meta;
        $this->content = $content;
    }

    public function getRaw(): string
    {
        return $this->raw;
    }

    public function getMeta(): array
    {
        return $this->meta;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
