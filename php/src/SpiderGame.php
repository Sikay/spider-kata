<?php

namespace SpiderKata;

class SpiderGame
{
    private $spiderWeb;
    private $spiderPlayer;
    private $spiderBot;

    private const MAX_TURN = 10;

    public function __construct()
    {
        $this->prepareGame();
    }

    private function prepareGame(): void
    {
        $botInitialCoordinate = new Coordinate(1, 3);
        $playerInitialCoordinate = new Coordinate(3, 3);
        $spiderWeb = new SpiderWeb();
        $this->spiderWeb = $spiderWeb;
        $this->spiderBot = new Spider($spiderWeb, $botInitialCoordinate);
        $this->spiderPlayer = new Spider($spiderWeb, $playerInitialCoordinate);
    }

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
