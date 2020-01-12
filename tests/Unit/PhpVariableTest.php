<?php

namespace Kdabrow\PhpFileModifier\Tests\Unit;

use Kdabrow\PhpFileModifier\PhpVariable;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class PhpVariableTest extends TestCase
{
    public function testIfNameIsSet()
    {
        $variable = new PhpVariable('test');

        $this->assertEquals('test', $variable->getName());
    }

    public function testIfValueHasDefaultValue()
    {
        $variable = new PhpVariable('test');

        $this->assertEquals('\'\'', $variable->getValue());
    }

    public function testReturnParamsTofillInStub()
    {
        $variable = new PhpVariable('test');
        $variable->setName('functionName');
        $variable->setValue('$anotherVariable;');

        $this->assertEquals([
            'name' => $variable->getName(),
            'value' => $variable->getValue(),
        ], $variable->getParamsToFillInStub());
    }

    public function testIfStubFileNameIsCorrect()
    {
        $variable = new PhpVariable('test');

        $this->assertEquals('variable.stub', $variable->getStubFileName());
    }
}