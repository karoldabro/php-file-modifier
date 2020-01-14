<?php

namespace Kdabrow\PhpFileModifier\Tests\Unit;

use Kdabrow\PhpFileModifier\PhpFunction;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class PhpFunctionTest extends TestCase
{
    public function testObjectIsCreated()
    {
        $function = new PhpFunction('test');

        $this->assertEquals('test', $function->getName());
    }

    public function testReturnAddColon()
    {
        $function = new PhpFunction('test');
        $function->setReturn('returnValue');

        $this->assertEquals(': returnValue', $function->getReturn());
    }

    public function testReturnParamsTofillInStub()
    {
        $function = new PhpFunction('test');
        $function->setReturn('returnValue');
        $function->setArguments('string argument1, string argument 2');
        $function->setName('functionName');
        $function->setBody('echo \'test value to show\'');

        $this->assertEquals([
            'name' => $function->getName(),
            'arguments' => $function->getArguments(),
            'return' => $function->getReturn(),
            'body' => $function->getBody(),
        ], $function->getParamsToFillInStub());
    }

    public function testIfStubFileNameIsCorrect()
    {
        $function = new PhpFunction('test');

        $this->assertEquals('function.stub', $function->getStubFileName());
    }
}
