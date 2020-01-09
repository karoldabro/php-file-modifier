<?php

namespace Kdabrow\PhpFileModifier\Contracts;

interface PhpFunctionInterface extends PhpBaseContentInterface
{
    /**
     * Get name
     *
     * @return  string
     */ 
    public function getName() : string;

    /**
     * Set name
     *
     * @param  string  $name  Name
     *
     * @return  PhpFunctionInterface
     */ 
    public function setName(string $name) : PhpFunctionInterface;

    /**
     * Get arguments
     *
     * @return  string
     */ 
    public function getArguments() : string;

    /**
     * Set arguments
     *
     * @param  string  $arguments  Arguments
     *
     * @return  PhpFunctionInterface
     */ 
    public function setArguments(string $arguments) : PhpFunctionInterface;

    /**
     * Get return
     *
     * @return  string
     */ 
    public function getReturn() : string;

    /**
     * Set return
     *
     * @param  string  $return  Return
     *
     * @return  PhpFunctionInterface
     */ 
    public function setReturn(string $return) : PhpFunctionInterface;

    /**
     * Get internal part of method
     *
     * @return  string
     */ 
    public function getBody() : string;

    /**
     * Set internal part of method
     *
     * @param  string  $body  Internal part of method
     *
     * @return  PhpFunctionInterface
     */ 
    public function setBody(string $body) : PhpFunctionInterface;
}