<?php

namespace App\Tests\Service;

use App\Service\InputParser\TextInputParser;
use Exception;
use JetBrains\PhpStorm\NoReturn;
use PHPUnit\Framework\TestCase;

class InputParserTest extends TestCase
{
    /**
     * @throws Exception
     */
    #[NoReturn] public function testTextParsing(): void
    {
        $content = <<<HEREDOC
5 5
1 2 N 
LMLMLMLMM 
3 3 E 
MMRMMRMRRM
HEREDOC;

        $inputParser = new TextInputParser();
        $input = $inputParser->parse($content);

        $this->assertEquals(5, $input->getGrid()->getX());
        $this->assertEquals(5, $input->getGrid()->getY());

        $this->assertCount(2, $input->getRovers());

        $this->assertEquals(1, $input->getRovers()[0]->getCurrentPosition()->getXCoord());
        $this->assertEquals(2, $input->getRovers()[0]->getCurrentPosition()->getYCoord());
        $this->assertEquals('N', $input->getRovers()[0]->getCurrentPosition()->getFacing());
        $this->assertEquals('LMLMLMLMM', $input->getRovers()[0]->getActions());

        $this->assertEquals(3, $input->getRovers()[1]->getCurrentPosition()->getXCoord());
        $this->assertEquals(3, $input->getRovers()[1]->getCurrentPosition()->getYCoord());
        $this->assertEquals('E', $input->getRovers()[1]->getCurrentPosition()->getFacing());
        $this->assertEquals('MMRMMRMRRM', $input->getRovers()[1]->getActions());
    }
}
