<?php

namespace Kdabrow\PhpFileModifier\Modifier;

use Kdabrow\PhpFileModifier\Contracts\PhpBaseContentInterface;
use League\Flysystem\FilesystemInterface;

class Stub
{
    private $fileSystem;
    
    public function __construct(FilesystemInterface $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }

    public function toString(PhpBaseContentInterface $phpBaseContentInterface): string
    {
        $string = $this->getStub($phpBaseContentInterface->getStubFileName());

        foreach ($phpBaseContentInterface->getParamsToFillInStub() as $tag => $value) {
            $string = $this->replaceTag($string, $tag, $value);
        }

        return $string;
    }

    private function getStub(string $path) : string
    {
        return $this->fileSystem
            ->read($this->getStubsPath($path));
    }

    private function getStubsPath(string $stubName): string
    {
        return $stubName;
    }

    private function replaceTag(string $string, string $tag, string $value)
    {
        return str_replace('['.$tag.']', $value, $string);
    }
}
