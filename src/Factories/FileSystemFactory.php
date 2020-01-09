<?php

namespace Kdabrow\PhpFileModifier\Factories;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;
use League\Flysystem\FilesystemInterface;

class FileSystemFactory
{
    public function create(string $path = 'resources/stubs'): FilesystemInterface
    {
        $adapter = new Local($this->getDirPath().$path);

        return new Filesystem($adapter);
    }

    private function getDirPath(): string
    {
        return __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
    }
}