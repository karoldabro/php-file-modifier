<?php

namespace Kdabrow\PhpFileModifier\Modifiers;

use League\Flysystem\FilesystemInterface;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;
use Kdabrow\PhpFileModifier\Contracts\Modifiers\PlaceInterface;

/**
 * This class shows on which line code shoud modified
 */
class ClassPlace implements PlaceInterface
{
    /**
     * @var Finder
     */
    private $finder;

    public function __construct(PhpFileInterface $phpFileInterface, FilesystemInterface $filesystemInterface)
    {
        $this->finder = new ClassFinder($phpFileInterface, $filesystemInterface);
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
