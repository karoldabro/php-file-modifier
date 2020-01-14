<?php

namespace Kdabrow\PhpFileModifier\Factories;

use Kdabrow\PhpFileModifier\Contracts\Modifier\PlaceInterface;
use Kdabrow\PhpFileModifier\Modifier\ClassPlace;

class PlaceFactory
{
    public function createClassPlace(string $fileContent): PlaceInterface
    {
        return new ClassPlace($fileContent);
    }
}
