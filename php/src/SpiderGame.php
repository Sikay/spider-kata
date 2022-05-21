<?php

namespace SpiderKata;

class SpiderGame
{
    protected Spider $spiderPlayer;
    private Spider $spiderBot;
    protected SpiderWeb $spiderWeb;
    protected Turn $turn;

    protected const MAX_TURN = 10;

    public function __construct(Spider $spiderPlayer, Spider $spiderBot, SpiderWeb $spiderWeb)
    {
        $this->spiderPlayer = $spiderPlayer;
        $this->spiderBot = $spiderBot;
        $this->spiderWeb = $spiderWeb;
        $this->turn = new Turn(1);
    }

    public function play(): string
    {
        $this->playerMovement();

        if ($this->isSpiderCatches()) {
            return "win!!";
        }

        if ($this->isLastTurn()) {
            return "You Lose :(";
        }

        return $this->showSpiderPosition();
    }

    private function showSpiderPosition(): string
    {
        return "Player (x, y): (" . $this->spiderPlayer->coordinate()->x() . ", " . $this->spiderPlayer->coordinate()->y() . ")" .
            " - Bot (x, y): (" . $this->spiderBot->coordinate()->x() . ", " . $this->spiderBot->coordinate()->y() . ")";
    }

    private function isLastTurn(): bool
    {
        return $this->turn->show() === self::MAX_TURN;
    }

    private function isSpiderCatches(): int
    {
        return $this->spiderPlayer->coordinate()->equals($this->spiderBot->coordinate());
    }

    protected function playerMovement(): void
    {
        $movement = readline('Insert movement (W, A, S, D): ');
        $this->spiderPlayer->move($movement, $this->spiderWeb);
    }
}
