<?php

namespace Kdabrow\PhpFileModifier\Contracts\Modifiers;

interface PlaceInterface
{
    public function onLine(int $lineNumber) : int;

    public function atTheBeginning() : int;

    public function atTheEnd() : int;

    public function beforeProperty(string $propertyName) : int;

    public function afterProperty(string $propertyName) : int;

    public function beforeFunction(string $functionName) : int;

    public function afterFunction(string $functionName) : int;
}
