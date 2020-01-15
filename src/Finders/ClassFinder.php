<?php

namespace Kdabrow\PhpFileModifier\Finders;

use Kdabrow\PhpFileModifier\Modifiers\Coordinates;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;
use League\Flysystem\FilesystemInterface;

class ClassFinder
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

    public function __construct(PhpFileInterface $phpFileInterface, FilesystemInterface $filesystemInterface)
    {
        $this->phpFileInterface = $phpFileInterface;
        $this->filesystemInterface = $filesystemInterface;
    }

    public function trait(string $name) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function interface(string $name) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function class(string $name) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function pattern(string $pattern) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function variable(string $name) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function property(string $name) : Coordinates
    {
        $stream = $this->getStream();

        return $this->mayHaveBraces($stream, "/(public|private|protected)( +)\\$".$name."( *)=/");
    }

    public function method(string $name) : Coordinates
    {
        $stream = $this->getStream();

        return $this->mustHaveBraces($stream, "/(public|private|protected)( +)function( +)".$name."( *)\(.*\)/");
    }

    public function function(string $name) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    private function mustHaveBraces($stream, string $pattern, string $opening = "/\{/", string $ending = "/\}/")
    {
        $startLineNumber = null;
        $endLineNumber = null;

        $countNumberOfOpenBraces = 0;
        $countNumberOfCloseBraces = 0;

        $lineNumber = 0;
        while (($content = stream_get_line($stream, self::BYTES, PHP_EOL)) !== false) {
            $lineNumber++;
            
            if (preg_match($pattern, $content)) {
                $startLineNumber = $lineNumber;
            }
            if (!is_null($startLineNumber)) {
                if ($numberOfMachesStart = preg_match_all($opening, $content)) {
                    $countNumberOfOpenBraces += $numberOfMachesStart;
                }
                if ($numberOfMachesEnd = preg_match_all($ending, $content)) {
                    $countNumberOfCloseBraces += $numberOfMachesEnd;
                }

                if ($countNumberOfOpenBraces > 0 && $countNumberOfOpenBraces == $countNumberOfCloseBraces) {
                    $endLineNumber = $lineNumber;
                    break;
                }
            }
        }

        return new Coordinates($startLineNumber, $endLineNumber);
    }

    private function mayHaveBraces(
        $stream,
        string $startPattern,
        string $endPattern = "/;/",
        string $opening = "/\{/",
        string $ending = "/\}/"
    ) {
        $startLineNumber = null;
        $endLineNumber = null;

        $countNumberOfOpenBraces = 0;
        $countNumberOfCloseBraces = 0;

        $lineNumber = 0;
        while (($content = stream_get_line($stream, self::BYTES, PHP_EOL)) !== false) {
            $lineNumber++;
            
            if (preg_match($startPattern, $content)) {
                $startLineNumber = $lineNumber;
            }
            if (!is_null($startLineNumber)) {
                if ($numberOfMachesStart = preg_match_all($opening, $content)) {
                    $countNumberOfOpenBraces += $numberOfMachesStart;
                }

                if ($numberOfMachesEnd = preg_match_all($ending, $content)) {
                    $countNumberOfCloseBraces += $numberOfMachesEnd;
                }

                if ($countNumberOfOpenBraces == 0) {
                    if (preg_match($endPattern, $content)) {
                        $endLineNumber = $lineNumber;
                        break;
                    }
                }

                if ($countNumberOfOpenBraces > 0
                    && $countNumberOfOpenBraces == $countNumberOfCloseBraces
                    && preg_match($endPattern, $content)
                ) {
                    $endLineNumber = $lineNumber;
                    break;
                }
            }
        }

        return new Coordinates($startLineNumber, $endLineNumber);
    }

    private function getStream()
    {
        return $this->filesystemInterface->readStream($this->phpFileInterface->getPath());
    }
}
