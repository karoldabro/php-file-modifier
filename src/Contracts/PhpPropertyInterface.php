<?php

namespace Kdabrow\PhpFileModifier\Contracts;

interface PhpPropertyInterface extends PhpVariableInterface
{
    /**
     * Get access public|protected|private
     *
     * @return  string
     */ 
    public function getAccess() : string;

    /**
     * Set access public|protected|private
     *
     * @param  string  $access  Access public|protected|private
     *
     * @return  PhpPropertyInterface
     */ 
    public function setAccess(string $access) : PhpPropertyInterface;
}