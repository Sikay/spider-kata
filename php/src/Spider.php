<?php

namespace SpiderKata;

class Spider
{
    private $coordinate;
    private $spiderWeb;

    public function __construct(SpiderWeb $spiderWeb, Coordinate $coordinate)
    {
        $this->spiderWeb = $spiderWeb;
        $spiderWeb->exceedLimit($coordinate);
        $this->coordinate = $coordinate;
    }

    public function position()
    {
        return $this->coordinate;
    }

    public function move(string $movement): void
    {
        if (strtolower($movement) === 'w') {
            $destinationCoordinate = new Coordinate($this->position()->x(), $this->position()->y() + 1);
        }

        if (strtolower($movement) === 's') {
            $destinationCoordinate = new Coordinate($this->position()->x(), $this->position()->y() - 1);
        }

        if (strtolower($movement) === 'd') {
            $destinationCoordinate = new Coordinate($this->position()->x() + 1, $this->position()->y());
        }

        if (strtolower($movement) === 'a') {
            $destinationCoordinate = new Coordinate($this->position()->x() - 1, $this->position()->y());
        }

        $this->spiderWeb->exceedLimit($destinationCoordinate);
        $this->coordinate = $destinationCoordinate;
    }
}
