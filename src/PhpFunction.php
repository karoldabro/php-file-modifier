<?php

namespace Kdabrow\PhpFileModifier;

use Kdabrow\PhpFileModifier\Contracts\PhpFunctionInterface;
use Kdabrow\PhpFileModifier\General\Regex;
use Kdabrow\PhpFileModifier\Regex\PhpFunctionRegex;

class PhpFunction extends PhpBaseContent implements PhpFunctionInterface
{
    private $name;

    private $arguments = '';

    private $return = '';

    private $body = '';

    protected $stubFileName = 'function.stub';

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }

    public function getParamsToFillInStub(): array
    {
        return [
            'name' => $this->name,
            'arguments' => $this->arguments,
            'return' => $this->return,
            'body' => $this->body,
        ];
    }

    public function parse(string $content): bool
    {
        $this->setName('test');
        $this->setArguments('string $argument1, $argument2');
        $this->setBody('if($argument1 == strlen($argument2) {
            return true;
        }
        
        return false;');
        $this->parseReturn($content);

        return true;
    }

    private function parseReturn(string $content)
    {
        if ($match = Regex::firstMatch(PhpFunctionRegex::RETURN, $content)) {
            $this->setReturn(Regex::firstWord($match) ?? '');
        }
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name Name
     *
     * @return PhpFunctionInterface
     */
    public function setName(string $name): PhpFunctionInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get arguments
     *
     * @return string
     */
    public function getArguments(): string
    {
        return $this->arguments;
    }

    /**
     * Set arguments
     *
     * @param string $arguments Arguments
     *
     * @return PhpFunctionInterface
     */
    public function setArguments(string $arguments): PhpFunctionInterface
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * Get return
     *
     * @return string
     */
    public function getReturn(): string
    {
        return $this->return;
    }

    /**
     * Set return
     *
     * @param string $return Return
     *
     * @return PhpFunctionInterface
     */
    public function setReturn(string $return): PhpFunctionInterface
    {
        $this->return = ': ' . $return;

        return $this;
    }

    /**
     * Get internal part of method
     *
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Set internal part of method
     *
     * @param string $body Internal part of method
     *
     * @return PhpFunctionInterface
     */
    public function setBody(string $body): PhpFunctionInterface
    {
        $this->body = $body;

        return $this;
    }
}
