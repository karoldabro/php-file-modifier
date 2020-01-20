<?php

namespace Kdabrow\PhpFileModifier\Tests\Integration\Modifier;

use Mockery;
use Kdabrow\PhpFileModifier\Finders\ClassFinder;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Factories\FileSystemFactory;
use Kdabrow\PhpFileModifier\General\FileLineIterator;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class ClassFinderTest extends TestCase
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

    /**
     * @dataProvider providerIfFindingMethodWillReturnCorrectCoordinates
     */
    public function testIfFindingMethodWillReturnCorrectCoordinates($methodName, $startCoordinate, $endCoordinate): void
    {
        $finder = new ClassFinder();
        $finder->method($methodName);

        $this->fileLineIterator->setFinder($finder);
        $this->fileLineIterator->iterate();

        $coordinates = $finder->getMethod()->getCoordinates();

        $this->assertEquals($startCoordinate, $coordinates->getStartLine());
        $this->assertEquals($endCoordinate, $coordinates->getEndLine());
    }

    public function testIfMethodDoNotExistsAndNullAreReturned(): void
    {
        $finder = new ClassFinder($this->file, $this->filesystem);
        $coordinates = $finder->method("not_exists");

        $this->fileLineIterator->setFinder($finder);
        $this->fileLineIterator->iterate();

        $coordinates = $finder->getMethod()->getCoordinates();

        $this->assertNull($coordinates->getStartLine());
        $this->assertNull($coordinates->getEndLine());
    }

    public function testIfFindingMethodWillReturnCoordinatesWithManyBracesInOneLine(): void
    {
        $finder = new ClassFinder($this->file, $this->filesystem);
        $coordinates = $finder->method('many_brances_in_one_line');

        $this->fileLineIterator->setFinder($finder);
        $this->fileLineIterator->iterate();

        $coordinates = $finder->getMethod()->getCoordinates();

        $this->assertEquals(66, $coordinates->getStartLine());
        $this->assertEquals(70, $coordinates->getEndLine());
    }

    /**
     * @dataProvider providerIfPropertyWillBeFound
     */
    public function testIfPropertyWillBeFound($methodName, $startCoordinate, $endCoordinate): void
    {
        $finder = new ClassFinder($this->file, $this->filesystem);
        $coordinates = $finder->property($methodName);

        $this->fileLineIterator->setFinder($finder);
        $this->fileLineIterator->iterate();

        $coordinates = $finder->getMethod()->getCoordinates();

        $this->assertEquals($startCoordinate, $coordinates->getStartLine());
        $this->assertEquals($endCoordinate, $coordinates->getEndLine());
    }

    public function testIfClassWillBeFound(): void
    {
        $finder = new ClassFinder($this->file, $this->filesystem);
        $coordinates = $finder->class('FooClass');

        $this->fileLineIterator->setFinder($finder);
        $this->fileLineIterator->iterate();

        $coordinates = $finder->getMethod()->getCoordinates();

        $this->assertEquals(3, $coordinates->getStartLine());
        $this->assertEquals(120, $coordinates->getEndLine());
    }

    public function providerIfFindingMethodWillReturnCorrectCoordinates(): array
    {
        return [
            ['method1', 22, 36],
            ['getSomeProperty', 40, 43],
            ['method2', 45, 47],
            ['method3', 50, 50],
            ['method4', 53, 64],
        ];
    }

    public function providerIfPropertyWillBeFound()
    {
        return [
            ['property1', 72, 72],
            ['property2', 74, 74],
            ['property3', 76, 78],
            ['property4', 80, 82],
            ['property5', 84, 87],
            ['property6', 89, 91],
            ['property7', 93, 99],
            ['property8', 101, 104],
            ['property9', 106, 118],
        ];
    }
}
