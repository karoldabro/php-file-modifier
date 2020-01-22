<?php

namespace Kdabrow\PhpFileModifier\Tests\Unit\Finders\Methods;

use Kdabrow\PhpFileModifier\Tests\TestCase;
use Kdabrow\PhpFileModifier\Finders\Methods\MayHaveBracesMethod;
use Kdabrow\PhpFileModifier\Contracts\Finders\Methods\MethodInterface;

class MayHaveBracesMethodTest extends TestCase
{
    private $text = '
    line txt2 some text
    line 1 test
    {
        [
    line 3 some more text;
    4 line with some numbers 2 (34){
    }$()
    ]
    ;
    23
    o with pattern
    4*& }
    (@#
    )';

    public function testIfStartLineIsFoundCorrectly(): void
    {
        $mayHaveBracesMethod = new MayHaveBracesMethod("/line( +)[0-9]+/");

        $this->simulateLineIterator($mayHaveBracesMethod);

        $coordinates = $mayHaveBracesMethod->getCoordinates();

        $this->assertEquals(3, $coordinates->getStartLine());
    }

    public function testIfStartLineIsFoundCorrectlyForDifferentPattern(): void
    {
        $mayHaveBracesMethod = new MayHaveBracesMethod("/pattern/");

        $this->simulateLineIterator($mayHaveBracesMethod);

        $coordinates = $mayHaveBracesMethod->getCoordinates();

        $this->assertEquals(12, $coordinates->getStartLine());
    }

    public function testIfEndLineIsFoundCorrectlyEndSignIsSourondedByBraces(): void
    {
        $mayHaveBracesMethod = new MayHaveBracesMethod("/line( +)[0-9]+/");

        $this->simulateLineIterator($mayHaveBracesMethod);

        $coordinates = $mayHaveBracesMethod->getCoordinates();

        $this->assertEquals(null, $coordinates->getEndLine());
    }

    public function testIfEndLineIsFoundCorrectlyAfterBraces(): void
    {
        $mayHaveBracesMethod = new MayHaveBracesMethod("/line( +)[0-9]+/", "/@/");

        $this->simulateLineIterator($mayHaveBracesMethod);

        $coordinates = $mayHaveBracesMethod->getCoordinates();

        $this->assertEquals(14, $coordinates->getEndLine());
    }

    public function testIfEndLineIsFoundCorrectlyForDifferentPattern(): void
    {
        $mayHaveBracesMethod = new MayHaveBracesMethod("/pattern/", "/@/");

        $this->simulateLineIterator($mayHaveBracesMethod);

        $coordinates = $mayHaveBracesMethod->getCoordinates();

        $this->assertEquals(14, $coordinates->getEndLine());
    }

    private function simulateLineIterator(MethodInterface $methodInterface)
    {
        foreach (\preg_split("/((\r?\n)|(\r\n?))/", $this->text) as $currentLineNumber => $currentLine) {
            $currentLineNumber++;
            $methodInterface->lineIsMatched($currentLine, $currentLineNumber);
        }
    }
}
