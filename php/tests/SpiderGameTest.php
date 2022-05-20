<?php

namespace SpiderKata\Test;

use SpiderKata\Coordinate;
use SpiderKata\Spider;
use SpiderKata\SpiderWeb;
use SpiderKata\SpiderGame;
use PHPUnit\Framework\TestCase;

class SpiderGameTest extends TestCase
{
    /** @test */
    public function should_win_when_spider_take_the_spider_bot()
    {
        $coordinate = new Coordinate(0,0);

        $spider = $this->createMock(Spider::class);
        $spider->method('coordinate')
            ->willReturn($coordinate);

        $spiderBot = $this->createMock(Spider::class);
        $spider->method('coordinate')
            ->willReturn($coordinate);

        $spiderWeb = new SpiderWeb();
        $spiderGame = new SpiderGame($spider, $spiderBot, $spiderWeb);

        $this->assertSame($spiderGame->play(), 'win!!');
    }
}
