<?php

namespace Kdabrow\PhpFileModifier\General;

use Kdabrow\PhpFileModifier\Contracts\Finders\FinderInterface;
use League\Flysystem\FilesystemInterface;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;

class FileLineIterator
{
    const BYTES = 4096;

    /**
     * @var PhpFileInterface
     */
    private $phpFileInterface;

    /**
     * @var FilesystemInterface
     */
    private $filesystemInterface;

    /**
     * Array of registered finders
     *
     * @var FinderInterface[]
     */
    private $findersArray;

    public function __construct(PhpFileInterface $phpFileInterface, FilesystemInterface $filesystemInterface)
    {
        $this->phpFileInterface = $phpFileInterface;
        $this->filesystemInterface = $filesystemInterface;
    }

    public function iterate()
    {
        $stream = $this->getStream();
        $lineNumber = 0;
        while (($lineContent = stream_get_line($stream, self::BYTES, PHP_EOL)) !== false) {
            $lineNumber++;

            foreach ($this->getFinders() as $finder) {
                $finder->getMethod()->handleLine($lineContent, $lineNumber);
            }
        }
    }

    private function getStream()
    {
        return $this->filesystemInterface->readStream($this->phpFileInterface->getPath());
    }

    public function getFinders(): array
    {
        return $this->findersArray;
    }

    public function setFinders(array $findersArray): self
    {
        $this->findersArray = $findersArray;

        return $this;
    }

    public function setFinder(FinderInterface $finderInterface): self
    {
        $this->findersArray[] = $finderInterface;

        return $this;
    }
}
