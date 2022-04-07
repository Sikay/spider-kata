<?php

namespace SpiderKata\Test;

use SpiderKata\Spider;
use SpiderKata\Coordinate;
use PHPUnit\Framework\TestCase;

class SpiderTest extends TestCase
{
    /** @test */
    public function should_create_spider_from_coordinate()
    {
        $coordinate = new Coordinate(1, 3);
        $spider = new Spider($coordinate);
        $this->assertTrue($coordinate->equals($spider->position()));
    }

    /** @test */
    public function should_move_to_another_coordinate()
    {
        $coordinate = new Coordinate(1, 3);
        $spider = new Spider($coordinate);
        $newCoordinate = new Coordinate(2, 3);
        $spider->move($newCoordinate);
        $this->assertTrue($newCoordinate->equals($spider->position()));
    }
}
