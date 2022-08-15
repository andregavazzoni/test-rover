<?php

namespace App\Service\InputParser;

use App\Model\Grid;
use App\Model\Rover;

class Input
{
    private Grid $grid;

    /** @var Rover[]  */
    private array $rovers = [];

    /**
     * @return Grid
     */
    public function getGrid(): Grid
    {
        return $this->grid;
    }

    /**
     * @param Grid $grid
     */
    public function setGrid(Grid $grid): void
    {
        $this->grid = $grid;
    }

    /**
     * @return array
     */
    public function getRovers(): array
    {
        return $this->rovers;
    }

    /**
     * @param Rover[] $rovers
     */
    public function setRovers(array $rovers): void
    {
        $this->rovers = $rovers;
    }

    /**
     * @param Rover $rover
     */
    public function addRover(Rover $rover): void
    {
        $this->rovers[] = $rover;
    }
}