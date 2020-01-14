<?php

namespace Kdabrow\PhpFileModifier\Contracts;

interface PhpBaseContentInterface
{
    /**
     * Get stub file name
     *
     * @return string
     */
    public function getStubFileName() : string;

    public function getParamsToFillInStub() : array;
}
