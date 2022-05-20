<?php

namespace SpiderKata\Test;

use SpiderKata\Spider;
use SpiderKata\SpiderWeb;
use SpiderKata\SpiderGame;
use PHPUnit\Framework\TestCase;

class SpiderGameTest extends TestCase
{
    /** @test */
    public function should_win_when_spider_take_the_spider_bot()
    {
        $spider = new Spider();
        $spiderBot = new Spider();
        $spiderWeb = new SpiderWeb();
        $spiderGame = new SpiderGame($spider, $spiderBot, $spiderWeb);
        $this->assertSame($spiderGame->play(), 'win!!');
    }
}
