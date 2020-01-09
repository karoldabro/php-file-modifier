<?php

namespace Kdabrow\PhpFileModifier\Factories;

use Kdabrow\PhpFileModifier\PhpClass;
use Kdabrow\PhpFileModifier\Factories\PlaceFactory;
use Kdabrow\PhpFileModifier\Factories\ModifierFactory;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;

class PhpFactory
{
    public function createPhpClass(string $path): PhpFileInterface
    {
        return new PhpClass($path, new PlaceFactory(), new ModifierFactory());
    }
}