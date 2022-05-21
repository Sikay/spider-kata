<?php

namespace SpiderKata;

class SpiderWeb
{

    private const MIN_WIDTH = 0;
    private const MAX_WIDTH = 4;
    private const MIN_HEIGHT = 0;
    private const MAX_HEIGHT = 4;

    public function __construct()
    {
    }

    public function nextCoordinate(Coordinate $coordinate): Coordinate
    {
        if ($this->isOutOfLimits($coordinate)) {
            throw new \InvalidArgumentException();
        }

        return $coordinate;
    }

    private function isOutOfLimits(Coordinate $coordinate): bool
    {
        return $coordinate->x() < self::MIN_WIDTH || $coordinate->x() > self::MAX_WIDTH || $coordinate->y() < self::MIN_HEIGHT || $coordinate->y() > self::MAX_HEIGHT;
    }
}
