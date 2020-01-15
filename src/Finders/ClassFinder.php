<?php

namespace Kdabrow\PhpFileModifier\Finders;

use Kdabrow\PhpFileModifier\Modifiers\Coordinates;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;
use Kdabrow\PhpFileModifier\Contracts\Finders\FinderInterface;

class ClassFinder extends Finder implements FinderInterface
{
    public function wrapper(string $name) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function variable(string $name) : Coordinates
    {
        $stream = $this->getStream();

        return $this->mayHaveBraces($stream, "/(public|private|protected)( +)\\$".$name."( *)=/");
    }

    public function function(string $name) : Coordinates
    {
        $stream = $this->getStream();

        return $this->mustHaveBraces($stream, "/(public|private|protected)( +)function( +)".$name."( *)\(.*\)/");
    }
}
