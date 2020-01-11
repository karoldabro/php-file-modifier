<?php

namespace Kdabrow\PhpFileModifier\Tests\Unit;

use Kdabrow\PhpFileModifier\PhpProperty;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class PhpPropertyTest extends TestCase
{
    public function testIfAccessHasDefaultValue()
    {
        $property = new PhpProperty('test');

        $this->assertEquals('public', $property->getAccess());
    }

    public function testIfAccessCanBeSet()
    {
        $property = new PhpProperty('test');
        $property->setAccess('private');

        $this->assertEquals('private', $property->getAccess());
    }

    public function testReturnParamsTofillInStub()
    {
        $property = new PhpProperty('test');
        $property->setName('functionName');
        $property->setValue('$anotherVariable;');
        $property->setAccess('protected');

        $this->assertEquals([
            'name' => $property->getName(),
            'value' => $property->getValue(),
            'access' => $property->getAccess(),
        ], $property->getParamsToFillInStub());
    }

    public function testIfStubFileNameIsCorrect()
    {
        $property = new PhpProperty('test');

        $this->assertEquals('property.stub', $property->getStubFileName());
    }
}