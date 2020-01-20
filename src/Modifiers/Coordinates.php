<?php

namespace Kdabrow\PhpFileModifier\Modifiers;

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
    private $endLine;

    public function __construct(int $startLine = null, int $endLine = null)
    {
        $this->startLine = $startLine;
        $this->endLine = $endLine;
    }

    /**
     * Get line number in file where something starts
     *
     * @return int|null
     */
    public function getStartLine(): ?int
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
    public function getEndLine(): ?int
    {
        return $this->endLine;
    }

    /**
     * Set line number in file where something ends
     *
     * @param int|null $endLine Line number in file where something ends
     *
     * @return self
     */
    public function setEndLine(?int $endLine)
    {
        $this->endLine = $endLine;

        return $this;
    }
}
