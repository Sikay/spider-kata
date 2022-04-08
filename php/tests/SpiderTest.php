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
        $coordinate = new Coordinate(1, 3);
        $spiderWeb = new SpiderWeb();
        $spider = new Spider($spiderWeb, $coordinate);
        $newCoordinate = new Coordinate(2, 3);
        $spider->move($newCoordinate);
        $this->assertTrue($newCoordinate->equals($spider->position()));
    }

    /** @test */
    public function should_can_not_exceed_limit_when_move()
    {
        $this->expectException(\InvalidArgumentException::class);
        $coordinate = new Coordinate(1, 3);
        $spiderWeb = new SpiderWeb();
        $spider = new Spider($spiderWeb, $coordinate);
        $newCoordinate = new Coordinate(-2, 3);
        $spider->move($newCoordinate);
    }

    /** @test */
    public function should_not_create_when_exceed_limit()
    {
        $this->expectException(\InvalidArgumentException::class);
        $coordinate = new Coordinate(-2, 3);
        $spiderWeb = new SpiderWeb();
        $spider = new Spider($spiderWeb, $coordinate);
    }
}
