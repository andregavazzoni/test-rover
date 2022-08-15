<?php

namespace App\Service\InputParser;

use App\Model\Grid;
use App\Model\Position;
use App\Model\Rover;

class TextInputParser implements InputParserInterface
{
    /**
     * @throws InputParserException
     */
    public function parse(string $content): Input
    {
        $input = new Input();

        $rows = array_map('trim', explode(PHP_EOL, $content));

        $gridSizeStr = array_shift($rows);
        $gridSize = explode(" ", $gridSizeStr);

        if (count($gridSize) !== 2) {
            throw new InputParserException('Invalid grid size');
        }

        $grid = new Grid($gridSize[0], $gridSize[1]);
        $input->setGrid($grid);

        preg_match_all('/(\d+)\s(\d+)\s([NSEO])\s?\n([LRM]+)\s?\n?/i', $content, $matches);
        if ($matches) {
            for ($i = 0; $i < count($matches[0]); $i++) {
                $rover = new Rover();
                $position = new Position();
                $position->setXCoord($matches[1][$i]);
                $position->setYCoord($matches[2][$i]);
                $position->setFacing($matches[3][$i]);

                $rover->setActions($matches[4][$i]);
                $rover->setStartPosition($position);

                $input->addRover($rover);
            }
        }

        return $input;
    }
}