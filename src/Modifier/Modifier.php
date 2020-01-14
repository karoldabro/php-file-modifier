<?php

namespace Kdabrow\PhpFileModifier\Modifier;

use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;
use Kdabrow\PhpFileModifier\Contracts\PhpBaseContentInterface;

class Modifier
{
    public function __construct(
        PhpFileInterface $phpFileInterface,
        PhpBaseContentInterface $phpBaseContentInterface
    ) {
        throw new NotImplementedException();
    }

    public function insert(int $lineNumber)
    {
    }

    public function update(int $startLineNumber)
    {
    }
}
