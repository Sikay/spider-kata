<?php

namespace SpiderKata;

class Turn
{
    private int $turn;

    public function __construct(int $turn)
    {
        $this->turn = $turn;
    }

    public function show(): int
    {
        return $this->turn;
    }
}
