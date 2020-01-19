<?php

namespace Kdabrow\PhpFileModifier\Finders\Methods;

class Method
{
    protected $isDone = false;

    protected function setIsDone(): void
    {
        $this->isDone = true;
    }
}
