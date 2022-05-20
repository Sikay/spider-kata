<?php

namespace SpiderKata;

class Spider
{
    private Coordinate $coordinate;

    public function __construct(Coordinate $coordinate)
    {
        $this->coordinate = $coordinate;
    }

    public function coordinate(): Coordinate
    {
        return $this->coordinate;
    }

    public function move(string $direction): void
    {
        $x = $this->coordinate->x();
        $y = $this->coordinate->y();

        $direction = strtolower($direction);

        if ($direction === 'w') {
            $y += 1;
        }

        if ($direction === 's') {
            $y -= 1;
        }

        if ($direction === 'd') {
            $x += 1;
        }

        if ($direction === 'a') {
            $x -= 1;
        }

        $this->coordinate = new Coordinate($x, $y);
    }
}
