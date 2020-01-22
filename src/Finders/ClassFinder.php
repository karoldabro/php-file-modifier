<?php

namespace Kdabrow\PhpFileModifier\Finders;

use Kdabrow\PhpFileModifier\Finders\Methods\MayHaveBracesMethod;
use Kdabrow\PhpFileModifier\Finders\Methods\MustHaveBracesMethod;
use Kdabrow\PhpFileModifier\PhpClass;
use Kdabrow\PhpFileModifier\PhpMethod;
use Kdabrow\PhpFileModifier\PhpProperty;

class ClassFinder extends Finder
{
    public function class(string $name)
    {
        $this->setPhpType(PhpClass::class);
        $this->setMethod(new MustHaveBracesMethod("/class( +)" . $name . "/"));
    }

    public function property(string $name)
    {
        $this->setPhpType(PhpProperty::class);
        $this->setMethod(new MayHaveBracesMethod("/(public|private|protected)( +)\\$" . $name . "( *)=/"));
    }

    public function method(string $name)
    {
        $this->setPhpType(PhpMethod::class);
        $this->setMethod(new MustHaveBracesMethod("/(public|private|protected)( +)function( +)" . $name . "( *)\(.*\)/"));
    }
}
