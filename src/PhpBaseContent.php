<?php

namespace Kdabrow\PhpFileModifier;

use Kdabrow\PhpFileModifier\Factories\FileSystemFactory;

class PhpBaseContent
{
    protected function getStub(string $path) : string
    {
        $fileSystem = new FileSystemFactory();

        return $fileSystem
            ->create()
            ->read($this->getStubsPath($path));
    }

    private function getStubsPath(string $stubName): string
    {
        return $stubName;
    }

    protected function replaceTag(string $string, string $tag, string $value)
    {
        return str_replace('['.$tag.']', $value, $string);
    }
}