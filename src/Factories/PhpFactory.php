<?php

namespace Kdabrow\PhpFileModifier\Factories;

use Kdabrow\PhpFileModifier\PhpClass;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;

class PhpFactory
{
    public function createPhpClass(string $path): PhpFileInterface
    {
        return new PhpClass();
    }
}