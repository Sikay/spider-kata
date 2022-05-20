<?php

namespace SpiderKata;

class SpiderGame
{

    public function __construct(Spider $spider, Spider $spiderBot, SpiderWeb $spiderWeb)
    {
    }

    public function play(): string
    {
        return "win!!";
    }
}
