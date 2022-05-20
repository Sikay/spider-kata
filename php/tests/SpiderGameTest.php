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

    private Spider $spiderPlayer;
    private Spider $spiderBot;
    private SpiderWeb $spiderWeb;
    private SpiderGame $spiderGame;

    public function setUp(): void
    {
        $this->spiderPlayer = $this->createMock(Spider::class);
        $this->spiderBot = $this->createMock(Spider::class);
        $this->spiderWeb = new SpiderWeb();
        $this->spiderGame = new TestingSpiderGame($this->spiderPlayer, $this->spiderBot, $this->spiderWeb);
    }

    public function dataProvider(): iterable
    {
        yield "should_win_when_spider_take_the_spider_bot" => [
            new Coordinate(0,0),
            new Coordinate(0,0),
            'win!!'
        ];
        yield "should_view_both_spiders_positions_when_not_win" => [
            new Coordinate(0,0),
            new Coordinate(1,0),
            'Player (x, y): (0, 0) - Bot (x, y): (1, 0)'
        ];
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function should_return_the_expected_output(Coordinate $coordinatePlayer, Coordinate $coordinateBot, string $expected): void
    {
        $this->spiderPlayer->method('coordinate')
            ->willReturn($coordinatePlayer);
        $this->spiderBot->method('coordinate')
            ->willReturn($coordinateBot);

        $this->assertSame($expected, $this->spiderGame->play());
    }

    /** @test */
    public function should_lose_when_last_turn_passed_and_no_take_spider()
    {
        $coordinatePlayer = new Coordinate(0,0);
        $coordinateBot = new Coordinate(1,0);

        $this->spiderPlayer->method('coordinate')
            ->willReturn($coordinatePlayer);
        $this->spiderBot->method('coordinate')
            ->willReturn($coordinateBot);

        $this->spiderGame->jumpToLastTurn();

        $this->assertSame('You Lose :(', $this->spiderGame->play());
    }

    /** @test */
    public function should_spider_move_once_per_turn()
    {
        $coordinatePlayer = new Coordinate(0,0);
        $coordinateBot = new Coordinate(1,0);

        $spiderPlayer = new Spider($coordinatePlayer);
;
        $this->spiderBot->method('coordinate')
            ->willReturn($coordinateBot);

        $spiderGame = new TestingSpiderGame($spiderPlayer, $this->spiderBot, $this->spiderWeb);

        $this->assertSame('Player (x, y): (0, 1) - Bot (x, y): (1, 0)', $spiderGame->play());
    }
}
