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
}
