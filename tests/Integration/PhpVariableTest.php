<?php

namespace Kdabrow\PhpFileModifier\Tests\Integration;

use Kdabrow\PhpFileModifier\Factories\FileSystemFactory;
use Kdabrow\PhpFileModifier\PhpVariable;
use Kdabrow\PhpFileModifier\Modifiers\Stub;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class PhpVariableTest extends TestCase
{
    private $stub;
    
    public function setUp() : void
    {
        $filesystemFactory = new FileSystemFactory();

        $this->stub = new Stub($filesystemFactory->create());
    }

    /**
     * @dataProvider providerTestIfVariableIsGeneratedCorrectly
     */
    public function testIfVariableIsGeneratedCorrectly(string $name, string $value)
    {
        $variable = new PhpVariable($name);
        $variable->setValue($value);

        $expected = '$'.$name.' = '.$value;

        $this->assertEquals($expected, $this->stub->toString($variable));
    }

    public function providerTestIfVariableIsGeneratedCorrectly(): array
    {
        return [
            ['test', '1 + 2;'],
            ['test2', '\'some string\';'],
        ];
    }
}
