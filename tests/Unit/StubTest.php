<?php

namespace Kdabrow\PhpFileModifier\Tests\Unit;

use Mockery;
use Mockery\LegacyMockInterface;
use Kdabrow\PhpFileModifier\Stub;
use League\Flysystem\FilesystemInterface;
use Kdabrow\PhpFileModifier\Tests\TestCase;
use Kdabrow\PhpFileModifier\Contracts\PhpBaseContentInterface;

class StubTest extends TestCase
{
    /**
     * @var LegacyMockInterface
     */
    private $mockFilesystem;
    /**
     * @var LegacyMockInterface
     */
    private $mockBaseContent;

    public function setUp(): void
    {
        $stub = 'test [tag_1] test2
        [tag_2]
        [tag_3] some text \' :"" ';

        $this->mockFilesystem = Mockery::mock(FilesystemInterface::class);
        $this->mockFilesystem->shouldReceive('read')
            ->with('testFileName.stub')
            ->andReturn($stub);

        $this->mockBaseContent = Mockery::mock(PhpBaseContentInterface::class);
        $this->mockBaseContent->shouldReceive('getStubFileName')
            ->andReturn('testFileName.stub');
    }

    public function testIfReplacingTagsWorks(): void
    {
        $this->mockBaseContent->shouldReceive('getParamsToFillInStub')
            ->andReturn([
                'tag_1' => 'tag 1 content',
                'tag_2' => 'tag 2 content',
                'tag_3' => 'tag 3 content',
            ]);
        $stub = new Stub($this->mockFilesystem);

        $result = $stub->toString($this->mockBaseContent);

        $expected = 'test tag 1 content test2
        tag 2 content
        tag 3 content some text \' :"" ';

        $this->assertEquals($expected, $result);
    }
}