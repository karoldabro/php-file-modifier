<?php

namespace Kdabrow\PhpFileModifier\Contracts\Finders;

use Kdabrow\PhpFileModifier\Contracts\Finders\Methods\MethodInterface;

interface FinderInterface
{
    public function getMethod(): MethodInterface;
}
