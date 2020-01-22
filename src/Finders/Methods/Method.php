<?php

namespace Kdabrow\PhpFileModifier\Finders\Methods;

class Method
{
    protected $isDone = false;

    protected function setIsDone(): void
    {
        $this->isDone = true;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }
}
