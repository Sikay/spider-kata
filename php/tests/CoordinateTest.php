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

    /** @test */
    public function should_not_same_coordinate()
    {
        $coordinate = new Coordinate(1, 4);
        $secondCoordinate = new Coordinate(2, 4);
        $this->assertFalse($coordinate->equals($secondCoordinate));
    }

    /** @test */
   public function should_return_distance_between_two_coordinates()
   {
        $coordinate = new Coordinate(0, 3);
        $secondCoordinate = new Coordinate(3, 3);
        $this->assertTrue($coordinate->distance($secondCoordinate) === doubleval(3));
   }

   /** @test */
   public function should_not_match_distance_between_two_coordinates()
   {
        $coordinate = new Coordinate(0, 2);
        $secondCoordinate = new Coordinate(1, 3);
        $this->assertFalse($coordinate->distance($secondCoordinate) === doubleval(4));
   }
}
