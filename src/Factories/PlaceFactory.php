<?php

namespace Kdabrow\PhpFileModifier\Factories;

use Kdabrow\PhpFileModifier\Contracts\Modifiers\PlaceInterface;
use Kdabrow\PhpFileModifier\Modifiers\ClassPlace;

class PlaceFactory
{
    public function createClassPlace(string $fileContent): PlaceInterface
    {
        return new ClassPlace($fileContent);
    }
}
