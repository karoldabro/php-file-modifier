<?php

namespace Kdabrow\PhpFileModifier\Contracts\Finders;

use Kdabrow\PhpFileModifier\Modifiers\Coordinates;

interface FinderInterface
{
    /**
     * General wrapper class, trait, interface depends on context
     *
     * @param string $name
     *
     * @return Coordinates
     */
    public function wrapper(string $name) : Coordinates;

    /**
     * Variable or property depends on context
     *
     * @param string $name
     *
     * @return Coordinates
     */
    public function variable(string $name) : Coordinates;

    /**
     * Function or method depends on context
     *
     * @param string $name
     *
     * @return Coordinates
     */
    public function function(string $name) : Coordinates;
}