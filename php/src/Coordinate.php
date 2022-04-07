<?php

namespace SpiderKata;

class Coordinate
{
    private $x;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
    }

    public function x()
    {
        return $this->x;
    }
}
