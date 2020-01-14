<?php

namespace Kdabrow\PhpFileModifier\Factories;

use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Contracts\PhpBaseContentInterface;
use Kdabrow\PhpFileModifier\Modifier\Modifier;

class ModifierFactory
{
    public function create(
        PhpFileInterface $phpFileInterface,
        PhpBaseContentInterface $phpBaseContentInterface,
        int $lineNumber
    ) : Modifier {
        return new Modifier($phpFileInterface, $phpBaseContentInterface, $lineNumber);
    }
}
