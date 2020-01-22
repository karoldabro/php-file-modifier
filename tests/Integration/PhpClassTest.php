<?php

namespace Kdabrow\PhpFileModifier\Tests\Integration;

use Mockery;
use Kdabrow\PhpFileModifier\PhpClass;
use Kdabrow\PhpFileModifier\Tests\TestCase;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Factories\FileSystemFactory;

class PhpClassTest extends TestCase
{
    public function testIfClassNameIsDetectedCorrectly(): void
    {
        $expected = 'FooClass';

        // $phpClass = new PhpClass('tests/resources/filesystem/finderTestOne.testfile');
        // $phpClass->read();

        // dd($phpClass->getMethods());

        // $this->assertEquals($expected, $phpClass->getName());
    }
}
