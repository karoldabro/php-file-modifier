<?php

namespace Kdabrow\PhpFileModifier\IO;

use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\PhpClass;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;

class Reader
{
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function read(): ?PhpFileInterface
    {
        throw new NotImplementedException();

        return new PhpClass();
    }

    // public function read(): self
    // {
    //     // $methodFinder = (new ClassFinder())->method("[a-zA-Z0-9]+");

    //     // $fileLineIterator = new FileLineIterator(
    //     //     $this,
    //     //     (new FileSystemFactory())->create()
    //     // );

    //     // $fileLineIterator->setFinder($methodFinder);
    //     // $fileLineIterator->iterateByClone();

    //     // $this->methods = $fileLineIterator->getFinders();

    //     return $this;
    // }
}
