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
     * @return  self
     */ 
    public function setName(string $name) : self;

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
     * @return  self
     */ 
    public function setArguments(string $arguments) : self;

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
     * @return  self
     */ 
    public function setReturn(string $return) : self;

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
     * @return  self
     */ 
    public function setBody(string $body) : self;
}