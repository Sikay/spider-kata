<?php

namespace SpiderKata\Test;

use SpiderKata\SpiderWeb;
use SpiderKata\Coordinate;
use PHPUnit\Framework\TestCase;

class SpiderWebTest extends TestCase
{
   /** @test */
   public function should_not_exceed_the_limit()
   {
        $coordinate = new Coordinate(1, 3);
        $spiderWeb = new SpiderWeb();
        $spiderWeb->exceedLimit($coordinate);
        $this->assertTrue(true);
   }

   /** @test */
   public function should_exceed_the_limit_x_coordinate()
   {
        $this->expectException(\InvalidArgumentException::class);
        $coordinate = new Coordinate(5, 3);
        $spiderWeb = new SpiderWeb();
        $spiderWeb->exceedLimit($coordinate);
   }

   /** @test */
   public function should_exceed_the_limit_y_coordinate()
   {
        $this->expectException(\InvalidArgumentException::class);
        $coordinate = new Coordinate(2, 6);
        $spiderWeb = new SpiderWeb();
        $spiderWeb->exceedLimit($coordinate);
   }

   /** @test */
   public function should_exceed_the_limit_x_with_minus_value_coordinate()
   {
        $this->expectException(\InvalidArgumentException::class);
        $coordinate = new Coordinate(-1, 3);
        $spiderWeb = new SpiderWeb();
        $spiderWeb->exceedLimit($coordinate);
   }

   /** @test */
   public function should_exceed_the_limit_y_with_minus_value_coordinate()
   {
        $this->expectException(\InvalidArgumentException::class);
        $coordinate = new Coordinate(1, -1);
        $spiderWeb = new SpiderWeb();
        $spiderWeb->exceedLimit($coordinate);
   }

   /** @test */
   public function should_return_valid_movements()
   {
        $expectedOutput = [
            'w' => new Coordinate(2, 3),
            's' => new Coordinate(2, 1),
            'd' => new Coordinate(3, 2),
            'a' => new Coordinate(1, 2),
        ];
        $coordinate = new Coordinate(2, 2);
        $spiderWeb = new SpiderWeb();
        $this->assertEquals($spiderWeb->validMovement($coordinate), $expectedOutput, '\$canonicalize = true', 0.0, 10, true);
   }

   /** @test */
   public function should_return_valid_movements_when_stay_at_limits()
   {
        $spiderWeb = new SpiderWeb();
        $expectedOutput = [
            's' => new Coordinate($spiderWeb->maxWitdh(), $spiderWeb->maxHeight() - 1),
            'a' => new Coordinate($spiderWeb->maxWitdh() - 1, $spiderWeb->maxHeight()),
        ];
        $coordinate = new Coordinate($spiderWeb->maxWitdh(), $spiderWeb->maxHeight());
        $this->assertEquals($spiderWeb->validMovement($coordinate), $expectedOutput, '\$canonicalize = true', 0.0, 10, true);
   }
}
