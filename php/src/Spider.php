<?php

namespace SpiderKata;

class Spider
{
    private $coordinate;
    private $spiderWeb;

    public function __construct(SpiderWeb $spiderWeb, Coordinate $coordinate)
    {
        $this->spiderWeb = $spiderWeb;
        if(!$spiderWeb->exceedLimit($coordinate)) {
            $this->coordinate = $coordinate;
        }
    }

    public function position()
    {
        return $this->coordinate;
    }

    public function move(Coordinate $coordinate): void
    {
        $spiderWeb = new SpiderWeb();
        if(!$spiderWeb->exceedLimit($coordinate)) {
            $this->coordinate = $coordinate;
        }
    }
}
