<?php

namespace Kdabrow\PhpFileModifier\Modifier;

use Closure;
use Kdabrow\PhpFileModifier\Modifier\Coordinates;
use Kdabrow\PhpFileModifier\Contracts\PhpFileInterface;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;
use League\Flysystem\FilesystemInterface;

class Finder
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

    public function pattern(string $pattern) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function variable(string $pattern) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function property(string $pattern) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    public function method(string $name) : Coordinates
    {
        $stream = $this->filesystemInterface->readStream($this->phpFileInterface->getPath());

        return $this->beetweenBraces($stream, "/(public|private|protected)( +)function( +)".$name."( *)\(.*\)/");
    }

    public function function(string $pattern) : Coordinates
    {
        throw new NotImplementedException();

        return new Coordinates(0, 0);
    }

    private function beetweenBraces($stream, string $pattern)
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
                if (preg_match("/\{/", $content)) {
                    $countNumberOfOpenBraces++;
                }
                if (preg_match("/\}/", $content)) {
                    $countNumberOfCloseBraces++;
                }

                if ($countNumberOfOpenBraces > 0 && $countNumberOfOpenBraces == $countNumberOfCloseBraces) {
                    $endLineNumber = $lineNumber;
                    break;
                }
            }
        }

        return new Coordinates($startLineNumber, $endLineNumber);
    }
}