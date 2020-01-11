<?php

namespace Kdabrow\PhpFileModifier\Contracts;

interface PhpVariableInterface extends PhpBaseContentInterface
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
     * @return  PhpVariableInterface
     */ 
    public function setName(string $name) : PhpVariableInterface;

    /**
     * 
     * Get value
     *
     * @return  string
     */ 
    public function getValue() : string;

    /**
     * Set value
     *
     * @param  string  $value  Value
     *
     * @return  PhpVariableInterface
     */ 
    public function setValue(string $value) : PhpVariableInterface;
}