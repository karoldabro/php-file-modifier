<?php

namespace Kdabrow\PhpFileModifier\Tests\Integration;

use Kdabrow\PhpFileModifier\Factories\FileSystemFactory;
use Kdabrow\PhpFileModifier\PhpMethod;
use Kdabrow\PhpFileModifier\Modifier\Stub;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class PhpMethodTest extends TestCase
{
    private $stub;
    
    public function setUp() : void
    {
        $filesystemFactory = new FileSystemFactory();

        $this->stub = new Stub($filesystemFactory->create());
    }

    /**
     * @dataProvider providerIfFunctionIsGeneratedWithOnlyName
     */
    public function testIfFunctionIsGeneratedWithOnlyName(string $name)
    {
        $method = new PhpMethod($name);

        $expected = 'public function '.$name.'() 
{
    
}';

        $this->assertEquals($expected, $this->stub->toString($method));
    }

    public function testIfAllTagsAreReplaced()
    {
        $method = new PhpMethod('test');
        $method->setArguments('string $agrument1, array &$argument2');
        $method->setBody('return preg_replace(\'/regex/\', $argument1, $argument2);');
        $method->setReturn('string');
        $method->setAccess('protected');

        $expected = 'protected function test(string $agrument1, array &$argument2) : string
{
    return preg_replace(\'/regex/\', $argument1, $argument2);
}';

        $this->assertEquals($expected, $this->stub->toString($method));
    }

    public function providerIfFunctionIsGeneratedWithOnlyName(): array
    {
        return [
            ['test'],
            ['test2']
        ];
    }
}