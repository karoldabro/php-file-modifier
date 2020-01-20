<?php

namespace Kdabrow\PhpFileModifier\Finders\Methods;

use Kdabrow\PhpFileModifier\Contracts\Finders\Methods\MethodInterface;
use Kdabrow\PhpFileModifier\Modifiers\Coordinates;

class MustHaveBracesMethod extends Method implements MethodInterface
{
    private $startLineNumber = null;
    private $endLineNumber = null;

    private $countNumberOfOpenBraces = 0;
    private $countNumberOfCloseBraces = 0;

    private $pattern;

    private $openingBraces;
    private $endingBraces;

    public function __construct(string $pattern, string $openingBraces = "/\{/", string $endingBraces = "/\}/")
    {
        $this->pattern = $pattern;
        $this->openingBraces = $openingBraces;
        $this->endingBraces = $endingBraces;
    }

    public function handleLine(string $currentLine, int $currentLineNumber): void
    {
        if ($this->isDone) {
            return;
        }

        if (is_null($this->startLineNumber)) {
            if (preg_match($this->pattern, $currentLine)) {
                $this->startLineNumber = $currentLineNumber;
            }
        }

        if (!is_null($this->startLineNumber)) {
            if ($numberOfMatchesStart = preg_match_all($this->openingBraces, $currentLine)) {
                $this->countNumberOfOpenBraces += $numberOfMatchesStart;
            }
            if ($numberOfMatchesEnd = preg_match_all($this->endingBraces, $currentLine)) {
                $this->countNumberOfCloseBraces += $numberOfMatchesEnd;
            }

            if ($this->countNumberOfOpenBraces > 0 && $this->countNumberOfOpenBraces == $this->countNumberOfCloseBraces) {
                $this->endLineNumber = $currentLineNumber;
                $this->setIsDone();
            }
        }
    }

    public function getCoordinates(): Coordinates
    {
        return new Coordinates($this->startLineNumber, $this->endLineNumber);
    }
}
