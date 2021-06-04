<?php

declare(strict_types=1);

namespace P7v\Mrk\Entities;

use P7v\Mrk\Exceptions\FileNotFoundException;

class Input
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public static function fromString(string $content): self
    {
        return new self($content);
    }

    public static function fromFile(string $path): self
    {
        $realpath = realpath($path);

        if ($realpath === false) {
            throw new FileNotFoundException($path);
        }

        return self::fromString(file_get_contents($realpath));
    }

    public function __toString(): string
    {
        return $this->content;
    }
}
