<?php

namespace SpiderKata;

class SpiderGame
{
    private $spiderWeb;
    private $spiderPlayer;
    private $spiderBot;

    private const MAX_TURN = 10;

    public function __construct()
    {
        $this->prepareGame();
    }

    private function prepareGame(): void
    {
        $botInitialCoordinate = new Coordinate(1, 3);
        $playerInitialCoordinate = new Coordinate(3, 3);
        $spiderWeb = new SpiderWeb();
        $this->spiderWeb = $spiderWeb;
        $this->spiderBot = new Spider($spiderWeb, $botInitialCoordinate);
        $this->spiderPlayer = new Spider($spiderWeb, $playerInitialCoordinate);
    }

    public function isGameFinish(Coordinate $coordinateSpiderBot, Coordinate $coordinateSpiderPlayer, int $currentTurn): bool
    {
        if ($coordinateSpiderBot->equals($coordinateSpiderPlayer)) {
            return true;
        }

        if ($currentTurn === self::MAX_TURN) {
            return true;
        }

        return false;
    }

    public function maxTurn()
    {
        return self::MAX_TURN;
    }

    public function play() {
        $currentTurn = 0;
        do {
            $currentTurn++;

            $movementDistance = $this->botDistanceByMovement();
            $this->spiderBot->move($this->bestMovementByDistance($movementDistance));


            printf('Turno actual: ' . $currentTurn. PHP_EOL);
            for ($height = 5; $height >= 0; $height--) {
                for ($width = 0; $width <= 4; $width++) {
                    if ($this->spiderPlayer->position()->x() === $width && $this->spiderPlayer->position()->y() === $height) {
                        if ($width === 4) {
                            printf('P');
                        } else {
                            printf('P - ');
                        }
                    } else if ($this->spiderBot->position()->x() === $width && $this->spiderBot->position()->y() === $height) {
                        if ($width === 4) {
                            printf('B');
                        } else {
                            printf('B - ');
                        }
                    } else if ($width === 4) {
                        printf('o');
                    } else {
                        printf('o - ');
                    }
                }
                if ($height > 0) {
                    printf(PHP_EOL);
                    for ($width = 0; $width <= 4; $width++) {
                        printf('|   ');
                    }
                }
                printf(PHP_EOL);
            }

            do{
                $movementMade = false;
                $movement = readline('Ingresa movimiento: ');
                try {
                    $this->spiderPlayer->move($movement);
                    $movementMade = true;
                } catch (\Exception $e) {
                    printf($e->getMessage() . PHP_EOL);
                }

            } while ($movementMade === false);

        } while (!$this->isGameFinish($this->spiderBot->position(), $this->spiderPlayer->position(), $currentTurn));

        return 'The game is finish';
    }

    private function bestMovementByDistance(array $movementDistance): string
    {
        arsort($movementDistance);
        return array_key_first($movementDistance);
    }

    private function botDistanceByMovement(): array
    {
        $validMovement = $this->spiderWeb->validMovement($this->spiderBot->position());
        $movementDistance = [];
        foreach ($validMovement as $move => $validCoordinate) {
            $movementDistance[$move] = $validCoordinate->distance($this->spiderPlayer->position());
        }
        return $movementDistance;
    }
}
