<?php

namespace Kdabrow\PhpFileModifier\Finders;

use Kdabrow\PhpFileModifier\Modifiers\Coordinates;

class ClassFinder extends Finder
{
    public function class(string $name): Coordinates
    {
        $stream = $this->getStream();

        return $this->mustHaveBraces($stream, "/class( +)" . $name . "/");
    }

    public function property(string $name): Coordinates
    {
        $stream = $this->getStream();

        return $this->mayHaveBraces($stream, "/(public|private|protected)( +)\\$" . $name . "( *)=/");
    }

    public function method(string $name): Coordinates
    {
        $stream = $this->getStream();

        return $this->mustHaveBraces($stream, "/(public|private|protected)( +)function( +)" . $name . "( *)\(.*\)/");
    }
}
