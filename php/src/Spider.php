<?php

namespace SpiderKata;

class Spider
{
    private Coordinate $coordinate;

    public function __construct()
    {
    }

    public function coordinate(): Coordinate
    {
        return $this->coordinate;
    }
}
