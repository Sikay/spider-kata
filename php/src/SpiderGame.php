<?php

namespace SpiderKata;

class SpiderGame
{
    private const MAX_TURN = 10;

    public function isGameFinish(Coordinate $coordinateSpiderBot, Coordinate $coordinateSpiderPlayer, int $currentTurn): bool
    {
        if ($coordinateSpiderBot->equals($coordinateSpiderPlayer)) {
            return true;
        }

        if ($currentTurn === self::MAX_TURN) {
            return true;
        }

        return false;
    }

    public function maxTurn()
    {
        return self::MAX_TURN;
    }
}
