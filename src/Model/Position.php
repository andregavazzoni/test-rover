<?php

namespace App\Model;

class Position
{
    private int $xCoord = 0;
    private int $yCoord = 0;
    private string $facing = 'N';

    /**
     * @param string $facing
     * @return Position
     */
    public function setFacing(string $facing): Position
    {
        $this->facing = $facing;
        return $this;
    }

    /**
     * @param int $xCoord
     * @return Position
     */
    public function setXCoord(int $xCoord): Position
    {
        $this->xCoord = $xCoord;
        return $this;
    }

    /**
     * @param int $yCoord
     * @return Position
     */
    public function setYCoord(int $yCoord): Position
    {
        $this->yCoord = $yCoord;
        return $this;
    }

    /**
     * @return int
     */
    public function getXCoord(): int
    {
        return $this->xCoord;
    }

    /**
     * @return int
     */
    public function getYCoord(): int
    {
        return $this->yCoord;
    }

    /**
     * @return string
     */
    public function getFacing(): string
    {
        return $this->facing;
    }
}