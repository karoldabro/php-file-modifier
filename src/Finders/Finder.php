<?php

namespace Kdabrow\PhpFileModifier\Finders;

use Kdabrow\PhpFileModifier\Contracts\Finders\FinderInterface;
use Kdabrow\PhpFileModifier\Contracts\Finders\Methods\MethodInterface;

class Finder implements FinderInterface
{
    private $method;

    public function setMethod(MethodInterface $methodInterface): FinderInterface
    {
        $this->method = $methodInterface;

        return $this;
    }

    public function getMethod(): MethodInterface
    {
        return $this->method;
    }
}
