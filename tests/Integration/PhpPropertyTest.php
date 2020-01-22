<?php

namespace Kdabrow\PhpFileModifier\Tests\Integration;

use Kdabrow\PhpFileModifier\Factories\FileSystemFactory;
use Kdabrow\PhpFileModifier\PhpProperty;
use Kdabrow\PhpFileModifier\Modifiers\Stub;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class PhpPropertyTest extends TestCase
{
    private $stub;

    public function setUp(): void
    {
        $filesystemFactory = new FileSystemFactory();

        $this->stub = new Stub($filesystemFactory->create('resources/stubs'));
    }

    public function testIfPropertyIsGeneratedWithDefaultAccess()
    {
        $property = new PhpProperty('test');

        $expected = 'public $test = \'\'';

        $this->assertEquals($expected, $this->stub->toString($property));
    }

    /**
     * @dataProvider providerTestIfPropertyIsGeneratedCorrectly
     */
    public function testIfPropertyIsGeneratedCorrectly(string $name, string $value, string $access)
    {
        $property = new PhpProperty($name);
        $property->setValue($value);
        $property->setAccess($access);

        $expected = $access . ' $' . $name . ' = ' . $value;

        $this->assertEquals($expected, $this->stub->toString($property));
    }

    public function providerTestIfPropertyIsGeneratedCorrectly(): array
    {
        return [
            ['test', '1 + 2;', 'private'],
            ['test2', '\'some string\';', 'public'],
        ];
    }
}
