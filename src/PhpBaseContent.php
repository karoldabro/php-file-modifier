<?php

namespace Kdabrow\PhpFileModifier;

class PhpBaseContent
{
    /**
     * Stub file name
     *
     * @var string
     */
    protected $stubFileName;

    /**
     * Get stub file name
     *
     * @return string
     */
    public function getStubFileName() : string
    {
        return $this->stubFileName;
    }
}
