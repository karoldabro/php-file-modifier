<?php

namespace Kdabrow\PhpFileModifier\Tests\Integration\Modifier;

use Mockery;
use Kdabrow\PhpFileModifier\Modifier\Finder;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Factories\FileSystemFactory;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class FinderTest extends TestCase
{
    private $file;

    private $filesystem;

    public function setUp(): void
    {
        $this->file = Mockery::mock(PhpFileInterface::class);
        $this->file->shouldReceive('getPath')
            ->andReturn('finderTestOne.testfile');

        $this->filesystem = (new FileSystemFactory())
            ->create('tests/resources/filesystem');
    }

    /**
     * - odczytywanie zawartosci
     * - znajdowanie regexa i zwrtoka numeru linii
     * - znajdowanie zakonczenia ciała klasy
     * - znajdowanie zakonczenia ciala metody
     * - znajdowanie zakonczenia w jednej linii
     */

    /**
     * @dataProvider providerIfFindingMethodWillReturnCorrectCoordinates
     */
    public function testIfFindingMethodWillReturnCorrectCoordinates($methodName, $startCoordinate, $endCoordinate): void
    {
        $finder = new Finder($this->file, $this->filesystem);
        $coordinates = $finder->method($methodName);

        $this->assertEquals($startCoordinate, $coordinates->getStartLine());
        $this->assertEquals($endCoordinate, $coordinates->getEndline());
    }

    public function testIfMethodDoNotExistsAndNullAreReturned(): void
    {
        $finder = new Finder($this->file, $this->filesystem);
        $coordinates = $finder->method("not_exists");

        $this->assertNull($coordinates->getStartLine());
        $this->assertNull($coordinates->getEndline());
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
}
