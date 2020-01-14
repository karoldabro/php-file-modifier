<?php

namespace Kdabrow\PhpFileModifier;

use Kdabrow\PhpFileModifier\Contracts\PhpMethodInterface;
use Kdabrow\PhpFileModifier\Tests\NotImplementedException;

class PhpMethod extends PhpFunction implements PhpMethodInterface
{
    /**
     * @var string
     */
    private $access = 'public';

    protected $stubFileName = 'method.stub';

    public function getParamsToFillInStub() : array
    {
        return array_merge(
            parent::getParamsToFillInStub(),
            [
                'access' => $this->getAccess()
            ]
        );
    }

    /**
     * Get access public|protected|private
     *
     * @return string
     */
    public function getAccess() : string
    {
        return $this->access;
    }

    /**
     * Set access public|protected|private
     *
     * @param string $access Access public|protected|private
     *
     * @return PhpMethodInterface
     */
    public function setAccess(string $access) : PhpMethodInterface
    {
        $this->access = $access;

        return $this;
    }
}
