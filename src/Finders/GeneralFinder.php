<?php

namespace Kdabrow\PhpFileModifier\Finders;

use Kdabrow\PhpFileModifier\Modifiers\Coordinates;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;

class GeneralFinder extends Finder
{
    public function trait(string $name) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function interface(string $name) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function variable(string $name) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function function(string $name) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }
}
