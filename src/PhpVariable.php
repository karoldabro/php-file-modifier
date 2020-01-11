<?php

namespace Kdabrow\PhpFileModifier;

use Kdabrow\PhpFileModifier\Contracts\PhpVariableInterface;

class PhpVariable extends PhpBaseContent implements PhpVariableInterface
{
    private $name;

    private $value = '\'\'';

    protected $stubFileName = 'variable.stub';

    public function __construct(string $name)
    {
        $this->name = $name;
    }
    
    public function getParamsToFillInStub() : array
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
        ];
    }

    /**
     * Get name
     *
     * @return  string
     */ 
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param  string  $name  Name
     *
     * @return  PhpVariableInterface
     */ 
    public function setName(string $name) : PhpVariableInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * 
     * Get value
     *
     * @return  string
     */ 
    public function getValue() : string
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param  string  $value  Value
     *
     * @return  PhpVariableInterface
     */ 
    public function setValue(string $value) : PhpVariableInterface
    {
        $this->value = $value;

        return $this;
    }
}