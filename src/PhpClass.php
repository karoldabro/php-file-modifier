<?php

namespace Kdabrow\PhpFileModifier;

use Closure;
use Kdabrow\PhpFileModifier\Modifiers\Modifier;
use Kdabrow\PhpFileModifier\Finders\ClassFinder;
use Kdabrow\PhpFileModifier\Modifiers\ClassPlace;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;
use Kdabrow\PhpFileModifier\Contracts\PhpFunctionInterface;
use Kdabrow\PhpFileModifier\Contracts\PhpPropertyInterface;
use Kdabrow\PhpFileModifier\Contracts\PhpBaseContentInterface;

class PhpClass implements PhpBaseContentInterface, PhpFileInterface
{
    private $name = '';

    private $methods = [];

    private $properties = [];

    private $abstract = false;

    private $extends = '';

    private $implements = '';

    private $traits = [];

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }

    public function addUse(string $className): PhpFileInterface
    {
        throw new NotImplementedException();

        return $this;
    }

    public function getFunction(string $functionName): PhpFunctionInterface
    {
        throw new NotImplementedException;

        return new PhpMethod('');
    }

    public function addFunction(PhpFunctionInterface $phpMethodInterface, Closure $place): PhpFileInterface
    {
        throw new NotImplementedException();

        $lineNumber = $place(new ClassPlace(new ClassFinder($this, $this->filesystem)));

        new Modifier($this, $phpMethodInterface, $lineNumber);

        return $this;
    }

    public function updateFunction(PhpFunctionInterface $phpMethodInterface): PhpFileInterface
    {
        throw new NotImplementedException();

        return $this;
    }

    public function getProperty(string $propertyName): PhpPropertyInterface
    {
        throw new NotImplementedException;

        return new PhpProperty('');
    }

    public function addProperty(PhpPropertyInterface $phpPropertyInterface, Closure $place): PhpFileInterface
    {
        throw new NotImplementedException();

        return $this;
    }

    public function updateProperty(PhpPropertyInterface $phpPropertyInterface): PhpFileInterface
    {
        throw new NotImplementedException();

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return  string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getMethods(): array
    {
        return $this->methods;
    }

    public function setMethods(array $methods)
    {
        $this->methods = $methods;

        return $this;
    }
}
