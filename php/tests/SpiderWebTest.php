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
}
