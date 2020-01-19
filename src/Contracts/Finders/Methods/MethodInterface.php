<?php

namespace Kdabrow\PhpFileModifier\Contracts\Finders\Methods;

use Kdabrow\PhpFileModifier\Modifiers\Coordinates;

interface MethodInterface
{
    public function handleLine(string $currentLine, int $currentLineNumber): void;

    public function getCoordinates(): Coordinates;
}
