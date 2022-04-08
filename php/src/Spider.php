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
        $x = $this->position()->x();
        $y = $this->position()->y();

        if (strtolower($movement) === 'w') {
            $y = $y + 1;
        }

        if (strtolower($movement) === 's') {
            $y = $y - 1;
        }

        if (strtolower($movement) === 'd') {
            $x = $x + 1;
        }

        if (strtolower($movement) === 'a') {
            $x = $x - 1;
        }

        $destinationCoordinate = new Coordinate($x, $y);
        $this->spiderWeb->exceedLimit($destinationCoordinate);
        $this->coordinate = $destinationCoordinate;
    }
}
