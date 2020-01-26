<?php

namespace Kdabrow\PhpFileModifier\Contracts;

interface PhpBaseContentInterface
{
    /**
     * Get stub file name
     *
     * @return string
     */
    public function getStubFileName(): string;

    public function getParamsToFillInStub(): array;

    /**
     * Parse content to fill object properties
     *
     * @param string $content
     *
     * @return bool
     */
    public function parse(string $content): bool;
}
