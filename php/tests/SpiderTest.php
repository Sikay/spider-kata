<?php

namespace SpiderKata\Test;

use PHPUnit\Framework\TestCase;
use SpiderKata\Coordinate;
use SpiderKata\Spider;
use SpiderKata\SpiderWeb;

class SpiderTest extends TestCase
{
    /** @test */
    public function should_move_up_given_W()
    {
        $spiderWeb = new SpiderWeb();
        $destinationCoordinate = new Coordinate(0,1);
        $coordinate = new Coordinate(0,0);
        $spider = new Spider($coordinate);
        $spider->move('W', $spiderWeb);
        self::assertTrue($spider->coordinate()->equals($destinationCoordinate));
    }

    /** @test */
    public function should_move_right_given_D()
    {
        $spiderWeb = new SpiderWeb();
        $destinationCoordinate = new Coordinate(1,0);
        $coordinate = new Coordinate(0,0);
        $spider = new Spider($coordinate);
        $spider->move('D', $spiderWeb);
        self::assertTrue($spider->coordinate()->equals($destinationCoordinate));
    }

    /** @test */
    public function should_move_down_given_S()
    {
        $spiderWeb = new SpiderWeb();
        $destinationCoordinate = new Coordinate(1,0);
        $coordinate = new Coordinate(1,1);
        $spider = new Spider($coordinate);
        $spider->move('S', $spiderWeb);
        self::assertTrue($spider->coordinate()->equals($destinationCoordinate));
    }

    /** @test */
    public function should_move_left_given_A()
    {
        $spiderWeb = new SpiderWeb();
        $destinationCoordinate = new Coordinate(0,1);
        $coordinate = new Coordinate(1,1);
        $spider = new Spider($coordinate);
        $spider->move('a', $spiderWeb);
        self::assertTrue($spider->coordinate()->equals($destinationCoordinate));
    }

    /** @test */
    public function should_can_not_move_out_of_spider_web_limits()
    {
        self::expectException(\InvalidArgumentException::class);
        $spiderWeb = new SpiderWeb();
        $coordinate = new Coordinate(4,1);
        $spider = new Spider($coordinate);
        $spider->move('d', $spiderWeb);
    }
}
