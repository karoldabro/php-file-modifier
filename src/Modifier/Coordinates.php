<?php

namespace Kdabrow\PhpFileModifier\Modifier;

class Coordinates
{
    /**
     * Line number in file where something starts
     *
     * @var int|null
     */
    private $startLine;

    /**
     * Line number in file where something ends
     *
     * @var int|null
     */
    private $endline;

    public function __construct(int $startLine = null, int $endline = null)
    {
        $this->startLine = $startLine;
        $this->endline = $endline;
    }

    /**
     * Get line number in file where something starts
     *
     * @return int|null
     */
    public function getStartLine() : ?int
    {
        return $this->startLine;
    }

    /**
     * Set line number in file where something starts
     *
     * @param int|null $startLine Line number in file where something starts
     *
     * @return self
     */
    public function setStartLine(?int $startLine)
    {
        $this->startLine = $startLine;

        return $this;
    }

    /**
     * Get line number in file where something ends
     *
     * @return int|null
     */
    public function getEndline() : ?int
    {
        return $this->endline;
    }

    /**
     * Set line number in file where something ends
     *
     * @param int|null $endline Line number in file where something ends
     *
     * @return self
     */
    public function setEndline(?int $endline)
    {
        $this->endline = $endline;

        return $this;
    }
}
