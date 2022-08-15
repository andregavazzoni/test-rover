<?php

namespace App\Model;

class Grid
{
    private int $x = 0;
    private int $y = 0;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }


    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $x
     * @return Grid
     */
    public function setX(int $x): Grid
    {
        $this->x = $x;
        return $this;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int $y
     * @return Grid
     */
    public function setY(int $y): Grid
    {
        $this->y = $y;
        return $this;
    }
}