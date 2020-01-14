<?php

namespace Kdabrow\PhpFileModifier\Tests\Unit;

use Kdabrow\PhpFileModifier\Factories\FileSystemFactory;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class PhpClassTest extends TestCase
{
    public function test()
    {
        $factory = new FileSystemFactory();
        $fileSystem = $factory->create('src');
        $end = $fileSystem->readStream('PhpClass.php');
        
        $this->assertNotEmpty($end);
    }
}
