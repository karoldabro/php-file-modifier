<?php

namespace Kdabrow\PhpFileModifier\IO;

use Closure;
use Kdabrow\PhpFileModifier\PhpClass;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;
use Kdabrow\PhpFileModifier\Contracts\PhpBaseContentInterface;

class Writer
{
    /**
     * @var PhpFileInterface
     */
    private $phpFileInterface;
    /**
     * @var PhpBaseContentInterface
     */
    private $phpBaseContentInterface;

    public function __construct(
        PhpFileInterface $phpFileInterface,
        PhpBaseContentInterface $phpBaseContentInterface
    ) {
        $this->phpFileInterface = $phpFileInterface;
        $this->phpBaseContentInterface = $phpBaseContentInterface;
    }

    public function write(Closure $place): PhpFileInterface
    {
        throw new NotImplementedException();

        return new PhpClass();
    }
}
