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
        $this->assertFalse($spiderWeb->exceedLimit($coordinate));
   }

   /** @test */
   public function should_exceed_the_limit_x_coordinate()
   {
        $coordinate = new Coordinate(5, 3);
        $spiderWeb = new SpiderWeb();
        $this->assertTrue($spiderWeb->exceedLimit($coordinate));
   }
}
