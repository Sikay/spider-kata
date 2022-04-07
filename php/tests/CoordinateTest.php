<?php

namespace SpiderKata\Test;

use SpiderKata\KataTemplate;
use PHPUnit\Framework\TestCase;

class CoordinateTest extends TestCase
{
    /** @test */
    public function should_return_same_x_coordinate()
    {
        $coordinate = new Coordinate(2, 0);
        $this->assertTrue($coordinate->x() === 2);
    }
}
