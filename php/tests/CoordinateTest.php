<?php

namespace SpiderKata\Test;

use SpiderKata\Coordinate;
use PHPUnit\Framework\TestCase;

class CoordinateTest extends TestCase
{
    /** @test */
    public function should_return_same_x_coordinate()
    {
        $coordinate = new Coordinate(2, 0);
        $this->assertTrue($coordinate->x() === 2);
    }

    /** @test */
    public function should_return_same_y_coordinate()
    {
        $coordinate = new Coordinate(2, 4);
        $this->assertTrue($coordinate->y() === 4);
    }

    /** @test */
    public function should_return_same_coordinate()
    {
        $coordinate = new Coordinate(2, 4);
        $secondCoordinate = new Coordinate(2, 4);
        $this->assertTrue($coordinate->equals($secondCoordinate));
    }
}
