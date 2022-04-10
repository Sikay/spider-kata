<?php

namespace SpiderKata\Test;

use SpiderKata\SpiderGame;
use SpiderKata\SpiderWeb;
use SpiderKata\Coordinate;
use PHPUnit\Framework\TestCase;

class SpiderGameTest extends TestCase
{
    /** @test */
    public function should_finish_game_if_both_spiders_stay_at_the_same_coordinate(): void
    {
        $spiderGame = new SpiderGame();
        $currentTurn = $spiderGame->maxTurn() - 1;
        $coordinateSpiderBot = new Coordinate(3, 3);
        $coordinateSpiderPlayer = new Coordinate(3, 3);
        $this->assertTrue($spiderGame->isGameFinish($coordinateSpiderBot, $coordinateSpiderPlayer, $currentTurn));
    }

    /** @test */
    public function should_not_finish_game_if_both_spiders_stay_at_diferent_coordinate(): void
    {
        $spiderGame = new SpiderGame();
        $currentTurn = $spiderGame->maxTurn() - 1;
        $coordinateSpiderBot = new Coordinate(1, 3);
        $coordinateSpiderPlayer = new Coordinate(3, 3);
        $this->assertFalse($spiderGame->isGameFinish($coordinateSpiderBot, $coordinateSpiderPlayer, $currentTurn));
    }

    /** @test */
    public function should_finish_game_if_turns_are_over(): void
    {
        $spiderGame = new SpiderGame();
        $currentTurn = $spiderGame->maxTurn();
        $coordinateSpiderBot = new Coordinate(1, 3);
        $coordinateSpiderPlayer = new Coordinate(3, 3);
        $this->assertTrue($spiderGame->isGameFinish($coordinateSpiderBot, $coordinateSpiderPlayer, $currentTurn));
    }

    /** @test */
    public function should_game_will_finish(): void
    {
        $spiderGame = new SpiderGame();
        $this->assertTrue($spiderGame->play() === 'The game is finish');
    }

    /** @test */
    public function should_return_vertical_movement(): void
    {
        $spiderGame = new SpiderGame();
        $this->assertTrue($spiderGame->createVerticalMovement(0, 4) === '|   |   |   |   |   ');
    }

    /** @test */
    public function should_return_all_game_map(): void
    {
        $expectedOutput = "o - o - o - o - o" . "\n";
        $expectedOutput .= "|   |   |   |   |   " . "\n";
        $expectedOutput .= "o - o - o - o - o" . "\n";
        $expectedOutput .= "|   |   |   |   |   " . "\n";
        $expectedOutput .= "o - B - o - P - o" . "\n";
        $expectedOutput .= "|   |   |   |   |   " . "\n";
        $expectedOutput .= "o - o - o - o - o" . "\n";
        $expectedOutput .= "|   |   |   |   |   " . "\n";
        $expectedOutput .= "o - o - o - o - o" . "\n";
        $expectedOutput .= "|   |   |   |   |   " . "\n";
        $expectedOutput .= "o - o - o - o - o" . "\n";
        $spiderGame = new SpiderGame();
        $this->assertTrue($spiderGame->gameMap() === $expectedOutput);
    }
}
