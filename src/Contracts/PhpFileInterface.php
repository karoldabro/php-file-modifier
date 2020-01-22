<?php

namespace Kdabrow\PhpFileModifier\Contracts;

use Closure;

interface PhpFileInterface
{
    public function getPath(): string;

    public function addUse(string $className): PhpFileInterface;

    public function getFunction(string $functionName): PhpFunctionInterface;

    public function addFunction(PhpFunctionInterface $phpFunctionInterface, Closure $place): PhpFileInterface;

    public function updateFunction(PhpFunctionInterface $phpFunctionInterface): PhpFileInterface;

    public function getProperty(string $propertyName): PhpPropertyInterface;

    public function addProperty(PhpPropertyInterface $phpPropertyInterface, Closure $place): PhpFileInterface;

    public function updateProperty(PhpPropertyInterface $phpPropertyInterface): PhpFileInterface;
}
