<?php

namespace Kdabrow\PhpFileModifier\Modifiers;

use Kdabrow\PhpFileModifier\Contracts\Finders\FinderInterface;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;
use Kdabrow\PhpFileModifier\Contracts\Modifiers\PlaceInterface;

/**
 * This class shows on which line code shoud modified
 */
class ClassPlace implements PlaceInterface
{
    /**
     * @var FinderInterface
     */
    private $finder;

    public function __construct(FinderInterface $finderInterface)
    {
        $this->finder = $finderInterface;
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
