<?php

namespace SpiderKata\Test;

use PHPUnit\Framework\TestCase;
use SpiderKata\Coordinate;
use SpiderKata\Spider;

class SpiderTest extends TestCase
{
    /** @test */
    public function should_move_up_given_W()
    {
        $destinationCoordinate = new Coordinate(0,1);
        $coordinate = new Coordinate(0,0);
        $spider = new Spider($coordinate);
        $spider->move('W');
        self::assertTrue($spider->coordinate()->equals($destinationCoordinate));
    }
}
