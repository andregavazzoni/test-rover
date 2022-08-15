<?php

namespace App\Model;

class Rover
{
    private Position $startPosition;
    private string $actions;
    private Position $currentPosition;

    /**
     * @return Position
     */
    public function getStartPosition(): Position
    {
        return $this->startPosition;
    }

    /**
     * @param Position $startPosition
     * @return Rover
     */
    public function setStartPosition(Position $startPosition): Rover
    {
        $this->startPosition = $startPosition;
        $this->currentPosition = clone $this->startPosition;
        return $this;
    }

    /**
     * @return string
     */
    public function getActions(): string
    {
        return $this->actions;
    }

    /**
     * @param string $actions
     */
    public function setActions(string $actions): Rover
    {
        $this->actions = $actions;
        return $this;
    }

    /**
     * @return Position
     */
    public function getCurrentPosition(): Position
    {
        return $this->currentPosition;
    }

    /**
     * @param mixed $currentPosition
     */
    public function setCurrentPosition(Position $currentPosition): Rover
    {
        $this->currentPosition = $currentPosition;
        return $this;
    }

    public function executeActions(Grid $grid): void
    {
        $facingOption = [
            'N' => ['L' => 'W', 'R' => 'E'],
            'E' => ['L' => 'N', 'R' => 'S'],
            'S' => ['L' => 'E', 'R' => 'W'],
            'W' => ['L' => 'S', 'R' => 'N'],
        ];
        foreach (str_split($this->getActions()) as $action) {
            echo $action . PHP_EOL;
            if (preg_match('/[LR]/i', $action)) {
                $facing = $this->getCurrentPosition()->getFacing();
                $this->getCurrentPosition()->setFacing($facingOption[$facing][$action]);
            } elseif ($action === 'M') {
                $currentPosition = $this->getCurrentPosition();
                switch ($currentPosition->getFacing()) {
                    case 'N':
                        if ($currentPosition->getYCoord() < $grid->getY()) {
                            $currentPosition->setYCoord($currentPosition->getYCoord() + 1);
                        }
                        break;
                    case 'E':
                        if ($currentPosition->getXCoord() < $grid->getX()) {
                            $currentPosition->setXCoord($currentPosition->getXCoord() + 1);
                        }
                        break;
                    case 'S':
                        if ($currentPosition->getYCoord() > 0) {
                            $currentPosition->setYCoord($currentPosition->getYCoord() - 1);
                        }
                        break;
                    case 'W':
                        if ($currentPosition->getXCoord() > 0) {
                            $currentPosition->setXCoord($currentPosition->getXCoord() - 1);
                        }
                        break;
                }
            }
        }
    }
}