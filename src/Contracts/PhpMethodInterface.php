<?php

namespace Kdabrow\PhpFileModifier\Contracts;

interface PhpMethodInterface extends PhpFunctionInterface
{
    /**
     * Get access public|protected|private
     *
     * @return string
     */
    public function getAccess() : string;

    /**
     * Set access public|protected|private
     *
     * @param string $access Access public|protected|private
     *
     * @return PhpMethodInterface
     */
    public function setAccess(string $access) : PhpMethodInterface;
}
