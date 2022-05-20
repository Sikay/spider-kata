<?php

namespace SpiderKata\Test;

use SpiderKata\SpiderGame;
use SpiderKata\Turn;

class TestingSpiderGame extends SpiderGame
{
    public function jumpToLastTurn(): void
    {
        $this->turn = new Turn(self::MAX_TURN);
    }
}