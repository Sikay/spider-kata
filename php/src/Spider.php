<?php

namespace SpiderKata;

class Spider
{
    private $coordinate;
    private $spiderWeb;

    private const UP = 'w';
    private const DOWN = 's';
    private const RIGHT = 'd';
    private const LEFT = 'a';

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

        if (strtolower($movement) === self::UP) {
            $y = $y + 1;
        }

        if (strtolower($movement) === self::DOWN) {
            $y = $y - 1;
        }

        if (strtolower($movement) === self::RIGHT) {
            $x = $x + 1;
        }

        if (strtolower($movement) === self::LEFT) {
            $x = $x - 1;
        }

        $destinationCoordinate = new Coordinate($x, $y);
        $this->spiderWeb->exceedLimit($destinationCoordinate);
        $this->coordinate = $destinationCoordinate;
    }
}
