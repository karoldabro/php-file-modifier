<?php

namespace Kdabrow\PhpFileModifier\Modifier;

use Kdabrow\PhpFileModifier\Tests\NotImplementedException;
use Kdabrow\PhpFileModifier\Contracts\Modifier\PlaceInterface;

class ClassPlace implements PlaceInterface
{
    public function __construct(string $fileContent)
    {
        
    }

    public function onLine(int $lineNumber) : int
    {
        throw new NotImplementedException();

        return 0;
    }

    public function atTheBeginning() : int
    {
        throw new NotImplementedException();

        return 0;
    }

    public function atTheEnd() : int
    {
        throw new NotImplementedException();

        return 0;
    }

    public function beforeProperty(string $propertyName) : int
    {
        throw new NotImplementedException();

        return 0;
    }

    public function afterProperty(string $propertyName) : int
    {
        throw new NotImplementedException();

        return 0;
    }

    public function beforeFunction(string $functionName) : int
    {
        throw new NotImplementedException();

        return 0;
    }

    public function afterFunction(string $functionName) : int
    {
        throw new NotImplementedException();

        return 0;
    }
}