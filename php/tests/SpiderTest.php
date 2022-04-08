<?php

namespace SpiderKata\Test;

use SpiderKata\Spider;
use SpiderKata\SpiderWeb;
use SpiderKata\Coordinate;
use PHPUnit\Framework\TestCase;

class SpiderTest extends TestCase
{
    /** @test */
    public function should_create_spider_from_coordinate()
    {
        $coordinate = new Coordinate(1, 3);
        $spiderWeb = new SpiderWeb();
        $spider = new Spider($spiderWeb, $coordinate);
        $this->assertTrue($coordinate->equals($spider->position()));
    }

    /** @test */
    public function should_move_to_another_coordinate()
    {
        $expectedCoordinate = new Coordinate(1, 4);
        $coordinate = new Coordinate(1, 3);
        $spiderWeb = new SpiderWeb();
        $spider = new Spider($spiderWeb, $coordinate);
        $movement = 'W';
        $spider->move($movement);
        $this->assertTrue($expectedCoordinate->equals($spider->position()));
    }

    /** @test */
    public function should_can_not_exceed_limit_when_move()
    {
        $this->expectException(\InvalidArgumentException::class);
        $coordinate = new Coordinate(1, 5);
        $spiderWeb = new SpiderWeb();
        $spider = new Spider($spiderWeb, $coordinate);
        $movement = 'W';
        $spider->move($movement);
    }

    /** @test */
    public function should_not_create_when_exceed_limit()
    {
        $this->expectException(\InvalidArgumentException::class);
        $coordinate = new Coordinate(-2, 3);
        $spiderWeb = new SpiderWeb();
        $spider = new Spider($spiderWeb, $coordinate);
    }

    /** @test */
    public function should_move_to_right_coordinate()
    {
        $expectedCoordinate = new Coordinate(2, 3);
        $coordinate = new Coordinate(1, 3);
        $spiderWeb = new SpiderWeb();
        $spider = new Spider($spiderWeb, $coordinate);
        $movement = 'D';
        $spider->move($movement);
        $this->assertTrue($expectedCoordinate->equals($spider->position()));
    }

    /** @test */
    public function should_move_to_left_coordinate()
    {
        $expectedCoordinate = new Coordinate(0, 3);
        $coordinate = new Coordinate(1, 3);
        $spiderWeb = new SpiderWeb();
        $spider = new Spider($spiderWeb, $coordinate);
        $movement = 'A';
        $spider->move($movement);
        $this->assertTrue($expectedCoordinate->equals($spider->position()));
    }
}
