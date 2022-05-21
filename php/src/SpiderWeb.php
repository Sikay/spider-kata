<?php

namespace SpiderKata;

class SpiderWeb
{

    public function __construct()
    {
    }

    public function nextCoordinate(Coordinate $coordinate): Coordinate
    {
        if ($coordinate->x() > 4 || $coordinate->y() > 4) {
            throw new \InvalidArgumentException();
        }

        return $coordinate;
    }
}
