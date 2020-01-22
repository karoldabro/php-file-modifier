<?php

namespace Kdabrow\PhpFileModifier\Finders;

use Kdabrow\PhpFileModifier\Finders\Methods\MayHaveBracesMethod;
use Kdabrow\PhpFileModifier\Finders\Methods\MustHaveBracesMethod;

class ClassFinder extends Finder
{
    public function class(string $name)
    {
        $this->setMethod(new MustHaveBracesMethod("/class( +)" . $name . "/"));
    }

    public function property(string $name)
    {
        $this->setMethod(new MayHaveBracesMethod("/(public|private|protected)( +)\\$" . $name . "( *)=/"));
    }

    public function method(string $name)
    {
        $this->setMethod(new MustHaveBracesMethod("/(public|private|protected)( +)function( +)" . $name . "( *)\(.*\)/"));
    }
}
