<?php

namespace Kdabrow\PhpFileModifier\Contracts;

interface PhpClassInterface
{
    public function addUse(string $className) : PhpClassInterface;

    public function getMethod(string $propertyName) : PhpMethodInterface;

    public function addMethod(PhpMethodInterface $phpMethodInterface) : PhpClassInterface;

    public function updateMethod(PhpMethodInterface $phpMethodInterface) : PhpClassInterface;

    public function getProperty(string $propertyName) : PhpPropertyInterface;

    public function addProperty(PhpPropertyInterface $phpPropertyInterface) : PhpClassInterface;

    public function updateProperty(PhpPropertyInterface $phpPropertyInterface) : PhpClassInterface;
}