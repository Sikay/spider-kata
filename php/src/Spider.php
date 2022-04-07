<?php

namespace SpiderKata;

class Spider
{
    private $coordinate;

    public function __construct(Coordinate $coordinate)
    {
        $this->coordinate = $coordinate;
    }

    public function position()
    {
        return $this->coordinate;
    }
}
