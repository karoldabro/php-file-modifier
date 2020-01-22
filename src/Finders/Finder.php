<?php

namespace Kdabrow\PhpFileModifier\Finders;

use Kdabrow\PhpFileModifier\Contracts\Finders\FinderInterface;
use Kdabrow\PhpFileModifier\Contracts\Finders\Methods\MethodInterface;

class Finder implements FinderInterface
{
    private $method;

    private $phpType;

    private $found = '';

    public function setMethod(MethodInterface $methodInterface): FinderInterface
    {
        $this->method = $methodInterface;

        return $this;
    }

    public function getMethod(): MethodInterface
    {
        return $this->method;
    }

    public function getFound(): string
    {
        return $this->found;
    }

    public function setFound(string $found)
    {
        $this->found = $found;

        return $this;
    }

    public function addLineToFound(string $line)
    {
        $this->found .= $line . \PHP_EOL;

        return $this;
    }

    public function getPhpType(): string
    {
        return $this->phpType;
    }

    public function setPhpType(string $phpType)
    {
        $this->phpType = $phpType;

        return $this;
    }
}
