<?php

namespace Kdabrow\PhpFileModifier\Tests\Unit\Finders\Methods;

use Kdabrow\PhpFileModifier\Contracts\Finders\Methods\MethodInterface;
use Kdabrow\PhpFileModifier\Finders\Methods\MustHaveBracesMethod;
use Kdabrow\PhpFileModifier\Tests\TestCase;

class MustHaveBracesMethodTest extends TestCase
{
    private $text = '
    line txt2 some text
    line 1 test
    {
        [
    line 3 some more text
    4 line with some numbers 2 (34)
    $()
    ]
    ;
    23
    o
    4*& }
    (@#
    )';

    public function testIfStartLineIsFoundCorrectly(): void
    {
        $mustHaveBracesMethod = new MustHaveBracesMethod("/line( +)[0-9]+/");

        $this->simulateLineIterator($mustHaveBracesMethod);

        $coordinates = $mustHaveBracesMethod->getCoordinates();

        $this->assertEquals(3, $coordinates->getStartLine());
    }

    public function testIfEndLineIsFoundCorrectly(): void
    {
        $mustHaveBracesMethod = new MustHaveBracesMethod("/line( +)[0-9]+/");

        $this->simulateLineIterator($mustHaveBracesMethod);

        $coordinates = $mustHaveBracesMethod->getCoordinates();

        $this->assertEquals(13, $coordinates->getEndLine());
    }

    public function testIfEndLineFindingWorksForOtherTypeOfBraces(): void
    {
        $mustHaveBracesMethod = new MustHaveBracesMethod("/line( +)[0-9]+/", "/\[/", "/\]/");

        $this->simulateLineIterator($mustHaveBracesMethod);

        $coordinates = $mustHaveBracesMethod->getCoordinates();

        $this->assertEquals(9, $coordinates->getEndLine());
    }

    private function simulateLineIterator(MethodInterface $methodInterface)
    {
        foreach (\preg_split("/((\r?\n)|(\r\n?))/", $this->text) as $currentLineNumber => $currentLine) {
            $currentLineNumber++;
            $methodInterface->handleLine($currentLine, $currentLineNumber);
        }
    }
}
