<?php

namespace Kdabrow\PhpFileModifier\Contracts\Finders\Methods;

use Kdabrow\PhpFileModifier\Modifiers\Coordinates;

interface MethodInterface
{
    public function lineIsMatched(string $currentLine, int $currentLineNumber): bool;

    public function getCoordinates(): Coordinates;

    public function isDone(): bool;
}
