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

    public function move(Coordinate $coordinate)
    {
        $spiderWeb = new SpiderWeb();
        if($spiderWeb->exceedLimit($coordinate)) {
            throw new \InvalidArgumentException('Spider can not move to this coordinate');
        } else {
            $this->coordinate = $coordinate;
        }
    }
}
