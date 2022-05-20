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
        $this->coordinate = new Coordinate($this->coordinate->x(), $this->coordinate->y() + 1);
    }
}
