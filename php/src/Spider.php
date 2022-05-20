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
        if ($direction === 'W') {
            $this->coordinate = new Coordinate($this->coordinate->x(), $this->coordinate->y() + 1);
        } else {
            $this->coordinate = new Coordinate($this->coordinate->x() + 1, $this->coordinate->y());
        }
    }
}
