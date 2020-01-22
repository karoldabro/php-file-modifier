<?php

namespace Kdabrow\PhpFileModifier\Tests\Integration\General;

use Mockery;
use Kdabrow\PhpFileModifier\Tests\TestCase;
use Kdabrow\PhpFileModifier\Finders\ClassFinder;
use Kdabrow\PhpFileModifier\General\FileLineIterator;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Factories\FileSystemFactory;

class FileLineIteratorTest extends TestCase
{
    private $file;

    private $filesystem;

    /**
     * @var FileLineIterator
     */
    private $fileLineIterator;

    public function setUp(): void
    {
        $this->file = Mockery::mock(PhpFileInterface::class);
        $this->file->shouldReceive('getPath')
            ->andReturn('finderTestOne.testfile');

        $this->filesystem = (new FileSystemFactory())
            ->create('tests/resources/filesystem');

        $this->fileLineIterator = new FileLineIterator($this->file, $this->filesystem);
    }

    public function testIfManyFindersWillBeDone(): void
    {
        $finder1 = (new ClassFinder())->method("method2");
        $finder2 = (new ClassFinder())->property('property2');

        $this->fileLineIterator->setFinders([
            $finder1,
            $finder2,
        ]);
        $this->fileLineIterator->iterate();

        $coordinates1 = $finder1->getMethod()->getCoordinates();

        $this->assertEquals(45, $coordinates1->getStartLine());
        $this->assertEquals(47, $coordinates1->getEndLine());

        $coordinates2 = $finder2->getMethod()->getCoordinates();

        $this->assertEquals(74, $coordinates2->getStartLine());
        $this->assertEquals(74, $coordinates2->getEndLine());
    }

    public function testIfFinderContainsSearchedContent(): void
    {
        $finder = (new ClassFinder())->method("method4");

        $this->fileLineIterator->setFinders([
            $finder,
        ]);
        $this->fileLineIterator->iterate();

        $this->assertEquals(
            '    protected function method4() 
    {
        if () {
            if () {
                if () {
                    while() {

                    }
                }
            }
        }
    }
',
            $finder->getFound()
        );
    }
}
