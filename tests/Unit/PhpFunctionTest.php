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

    /**
     * @dataProvider providerIfFunctionIsGeneratedWithOnlyName
     */
    public function testIfFunctionIsGeneratedWithOnlyName(string $name)
    {
        $function = new PhpFunction($name);

        $expected = 'function '.$name.'() 
{
    
}';

        $this->assertEquals($expected, $function->toString());
    }

    public function testIfAllTagsAreReplaced()
    {
        $function = new PhpFunction('test');
        $function->setArguments('string $agrument1, array &$argument2');
        $function->setBody('return preg_replace(\'/regex/\', $argument1, $argument2);');
        $function->setReturn('string');


        $expected = 'function test(string $agrument1, array &$argument2) : string
{
    return preg_replace(\'/regex/\', $argument1, $argument2);
}';

        $this->assertEquals($expected, $function->toString());
    }

    public function providerIfFunctionIsGeneratedWithOnlyName(): array
    {
        return [
            ['test'],
            ['test2']
        ];
    }
}