<?php

namespace Kdabrow\PhpFileModifier;

use Kdabrow\PhpFileModifier\Contracts\PhpPropertyInterface;

class PhpProperty extends PhpVariable implements PhpPropertyInterface
{
    /**
     * @var string
     */
    private $access = 'public';

    protected $stubFileName = 'property.stub';

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
     * @return PhpPropertyInterface
     */
    public function setAccess(string $access) : PhpPropertyInterface
    {
        $this->access = $access;

        return $this;
    }
}
