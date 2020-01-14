<?php

namespace Kdabrow\PhpFileModifier;

use Closure;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Contracts\PhpMethodInterface;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;
use Kdabrow\PhpFileModifier\Contracts\PhpPropertyInterface;
use Kdabrow\PhpFileModifier\Factories\ModifierFactory;
use Kdabrow\PhpFileModifier\Factories\PlaceFactory;
use Kdabrow\PhpFileModifier\Modifier\ClassPlace;
use Kdabrow\PhpFileModifier\Modifier\Modifier;

class PhpClass implements PhpFileInterface
{
    /**
     * @var string
     */
    private $path = '';
    // /**
    //  * @var PlaceFactory
    //  */
    // private $placeFactory = null;
    // /**
    //  * @var ModifierFactory
    //  */
    // private $modifierFactory = null;

    public function __construct(string $path)
    {
        throw new NotImplementedException();

        $this->path = $path;
    }
    
    public function addUse(string $className) : PhpFileInterface
    {
        throw new NotImplementedException();

        return $this;
    }

    public function getFunction(string $functionName) : PhpMethodInterface
    {
        throw new NotImplementedException;

        return new PhpMethod();
    }

    public function addFunction(PhpMethodInterface $phpMethodInterface, Closure $place) : PhpFileInterface
    {
        throw new NotImplementedException();

        $lineNumber = $place(new ClassPlace($this->getContent()));

        new Modifier($this, $phpMethodInterface, $lineNumber);

        return $this;
    }

    public function updateFunction(PhpMethodInterface $phpMethodInterface) : PhpFileInterface
    {
        throw new NotImplementedException();

        return $this;
    }

    public function getProperty(string $propertyName) : PhpPropertyInterface
    {
        throw new NotImplementedException;

        return new PhpProperty();
    }

    public function addProperty(PhpPropertyInterface $phpPropertyInterface) : PhpFileInterface
    {
        throw new NotImplementedException();

        return $this;
    }

    public function updateProperty(PhpPropertyInterface $phpPropertyInterface) : PhpFileInterface
    {
        throw new NotImplementedException();

        return $this;
    }

    public function getPath() : string
    {
        return $this->path;
    }
}
