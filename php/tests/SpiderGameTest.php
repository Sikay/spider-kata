<?php

namespace SpiderKata\Test;

use SpiderKata\Coordinate;
use SpiderKata\Spider;
use SpiderKata\SpiderWeb;
use SpiderKata\SpiderGame;
use PHPUnit\Framework\TestCase;
use SpiderKata\Turn;

class SpiderGameTest extends TestCase
{
    /** @test */
    public function should_win_when_spider_take_the_spider_bot()
    {
        $coordinate = new Coordinate(0,0);

        $spider = $this->createMock(Spider::class);
        $spider->method('coordinate')
            ->willReturn($coordinate);

        $spiderBot = $this->createMock(Spider::class);
        $spiderBot->method('coordinate')
            ->willReturn($coordinate);

        $spiderWeb = new SpiderWeb();
        $spiderGame = new TestingSpiderGame($spider, $spiderBot, $spiderWeb);

        $this->assertSame('win!!', $spiderGame->play());
    }

    /** @test */
    public function should_not_win_when_spider_not_take_the_spider_bot()
    {
        $coordinatePlayer = new Coordinate(0,0);
        $coordinateBot = new Coordinate(1,0);

        $spider = $this->createMock(Spider::class);
        $spider->method('coordinate')
            ->willReturn($coordinatePlayer);

        $spiderBot = $this->createMock(Spider::class);
        $spiderBot->method('coordinate')
            ->willReturn($coordinateBot);

        $spiderWeb = new SpiderWeb();
        $spiderGame = new TestingSpiderGame($spider, $spiderBot, $spiderWeb);

        $this->assertNotSame('win!!', $spiderGame->play());
    }

    /** @test */
    public function should_view_both_spiders_positions_when_not_win()
    {
        $coordinatePlayer = new Coordinate(0,0);
        $coordinateBot = new Coordinate(1,0);

        $spider = $this->createMock(Spider::class);
        $spider->method('coordinate')
            ->willReturn($coordinatePlayer);

        $spiderBot = $this->createMock(Spider::class);
        $spiderBot->method('coordinate')
            ->willReturn($coordinateBot);

        $spiderWeb = new SpiderWeb();
        $spiderGame = new TestingSpiderGame($spider, $spiderBot, $spiderWeb);

        $this->assertSame('Player (x, y): (0, 0) - Bot (x, y): (1, 0)', $spiderGame->play());
    }

    /** @test */
    public function should_lose_when_last_turn_passed_and_no_take_spider()
    {
        $coordinatePlayer = new Coordinate(0,0);
        $coordinateBot = new Coordinate(1,0);

        $spider = $this->createMock(Spider::class);
        $spider->method('coordinate')
            ->willReturn($coordinatePlayer);

        $spiderBot = $this->createMock(Spider::class);
        $spiderBot->method('coordinate')
            ->willReturn($coordinateBot);

        $spiderWeb = new SpiderWeb();
        $spiderGame = new TestingSpiderGame($spider, $spiderBot, $spiderWeb);
        $spiderGame->jumpToLastTurn();

        $this->assertSame('You Lose :(', $spiderGame->play());
    }

    /** @test */
    public function should_spider_move_once_per_turn()
    {
        $coordinatePlayer = new Coordinate(0,0);
        $coordinateBot = new Coordinate(1,0);

        $spider = new Spider($coordinatePlayer);

        $spiderBot = $this->createMock(Spider::class);
        $spiderBot->method('coordinate')
            ->willReturn($coordinateBot);

        $spiderWeb = new SpiderWeb();
        $spiderGame = new TestingSpiderGame($spider, $spiderBot, $spiderWeb);

        $this->assertSame('Player (x, y): (0, 1) - Bot (x, y): (1, 0)', $spiderGame->play());
    }
}
