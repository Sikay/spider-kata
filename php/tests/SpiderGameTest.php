<?php

namespace SpiderKata\Test;

use SpiderKata\Spider;
use SpiderKata\SpiderWeb;
use SpiderKata\Coordinate;
use PHPUnit\Framework\TestCase;

class SpiderTest extends TestCase
{
    public function should_finish_game_if_both_spiders_stay_at_the_same_coordinate(): void
    {
        $spiderGame = new SpiderGame();
        $coordinateSpiderBot = new Coordinate(3, 3);
        $coordinateSpiderPlayer = new Coordinate(3, 3);
        $this->assertTrue($spiderGame->isGameFinish($coordinateSpiderBot, $coordinateSpiderPlayer));
    }

    public function should_not_finish_game_if_both_spiders_stay_at_diferent_coordinate(): void
    {
        $spiderGame = new SpiderGame();
        $coordinateSpiderBot = new Coordinate(1, 3);
        $coordinateSpiderPlayer = new Coordinate(3, 3);
        $this->assertTrue($spiderGame->isGameFinish($coordinateSpiderBot, $coordinateSpiderPlayer));
    }
}
