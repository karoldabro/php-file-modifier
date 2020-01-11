<?php

namespace Kdabrow\PhpFileModifier\Tests\Unit;

use Kdabrow\PhpFileModifier\PhpMethod;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class PhpMethodTest extends TestCase
{
    public function testIfAccessPropertyReturnsDefaultValue()
    {
        $method = new PhpMethod('test');

        $this->assertEquals('public', $method->getAccess());
    }

    public function testIfAccessPropertyIsImplemented()
    {
        $method = new PhpMethod('test');
        $method->setAccess('private');

        $this->assertEquals('private', $method->getAccess());
    }

    public function testReturnParamsTofillInStub()
    {
        $method = new PhpMethod('test');
        $method->setReturn('returnValue');
        $method->setArguments('string argument1, string argument 2');
        $method->setName('functionName');
        $method->setBody('echo \'test value to show\'');
        $method->setAccess('protected');

        $this->assertEquals([
            'name' => $method->getName(),
            'arguments' => $method->getArguments(),
            'return' => $method->getReturn(),
            'body' => $method->getBody(),
            'access' => $method->getAccess(),
        ], $method->getParamsToFillInStub());
    }

    public function testIfStubFileNameIsCorrect()
    {
        $method = new PhpMethod('test');

        $this->assertEquals('method.stub', $method->getStubFileName());
    }
}