<?php

namespace SpiderKata;

class SpiderGame
{
    private Spider $spiderPlayer;
    private Spider $spiderBot;

    public function __construct(Spider $spiderPlayer, Spider $spiderBot, SpiderWeb $spiderWeb)
    {
        $this->spiderPlayer = $spiderPlayer;
        $this->spiderBot = $spiderBot;
    }

    public function play(): string
    {
        if ($this->spiderPlayer->coordinate()->equals($this->spiderBot->coordinate())) {
            return "win!!";
        }

        return "Player (x, y): (" . $this->spiderPlayer->coordinate()->x() . ", " . $this->spiderPlayer->coordinate()->y() . ")" .
            " - Bot (x, y): (" . $this->spiderBot->coordinate()->x() . ", " . $this->spiderBot->coordinate()->y() . ")";
    }
}
