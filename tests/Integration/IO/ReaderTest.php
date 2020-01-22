<?php

namespace Kdabrow\PhpFileModifier\Tests\Integration\IO;

use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\IO\Reader;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class ReaderTest extends TestCase
{
    public function testIfPhpFileInterfaceIsReturned()
    {
        $reader = new Reader('tests/resources/filesystem/finderTestOne.testfile');

        $return = $reader->read();

        $this->assertInstanceOf(PhpFileInterface::class, $return);
    }
}
