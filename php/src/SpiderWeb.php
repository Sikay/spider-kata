<?php

namespace SpiderKata;

class SpiderWeb
{
    private const MAX_HEIGHT = 5;
    private const MAX_WITDH = 4;
    private const MIN_HEIGHT = 0;
    private const MIN_WITDH = 0;

    public function maxWitdh(): int
    {
        return self::MAX_WITDH;
    }

    public function maxHeight(): int
    {
        return self::MAX_HEIGHT;
    }

    public function exceedLimit(Coordinate $coordinate): void
    {
        self::exceedWidthLimit($coordinate->x());
        self::exceedHeightLimit($coordinate->y());
    }

    private static function exceedWidthLimit(int $width): void
    {
        if ($width > self::MAX_WITDH || $width < self::MIN_WITDH) {
            throw new \InvalidArgumentException('Spider can not move to this coordinate');
        }
    }

    private static function exceedHeightLimit(int $height): void
    {
        if ($height > self::MAX_HEIGHT || $height < self::MIN_HEIGHT) {
            throw new \InvalidArgumentException('Spider can not move to this coordinate');
        }
    }

    public function validMovement(Coordinate $coordinateMovement): array
    {
        $moves = [];
        $moves['w'] = new Coordinate($coordinateMovement->x(), $coordinateMovement->y() + 1);
        $moves['s'] = new Coordinate($coordinateMovement->x(), $coordinateMovement->y() - 1);
        $moves['d'] = new Coordinate($coordinateMovement->x() + 1, $coordinateMovement->y());
        $moves['a'] = new Coordinate($coordinateMovement->x() - 1, $coordinateMovement->y());

        $validMovement = [];
        foreach ($moves as $move => $coordinate) {
            try {
                $this->exceedLimit($coordinate);
                $validMovement[$move] = $coordinate;
            } catch (\InvalidArgumentException $e) {}
        }
        return $validMovement;
    }

    public function show(Coordinate $playerCoordinate, Coordinate $botCoordinate): string
    {
        $gameMap = '';
        for ($height = self::MAX_HEIGHT; $height >= self::MIN_HEIGHT; $height--) {
            $gameMap .= $this->createHorizontalMovement($playerCoordinate, $botCoordinate, $height);
            if ($height > self::MIN_HEIGHT) {
                $gameMap .= "\n" . $this->createVerticalMovement();
            }
            $gameMap .= "\n";
        }
        return $gameMap;
    }

    private function createVerticalMovement(): string
    {
        $verticalMovement = '';
        for ($width = self::MIN_WITDH; $width <= self::MAX_WITDH; $width++) {
            $verticalMovement .= '|   ';
        }
        return $verticalMovement;
    }

    private function createHorizontalMovement(Coordinate $playerCoordinate, Coordinate $botCoordinate, int $height): string
    {
        $horizontalMovement = '';
        for ($width = self::MIN_WITDH; $width <= self::MAX_WITDH; $width++) {
            if ($playerCoordinate->equals(new Coordinate($width, $height))) {
                $horizontalMovement .= 'P';
            } else if ($botCoordinate->equals(new Coordinate($width, $height))) {
                $horizontalMovement .= 'B';
            } else {
                $horizontalMovement .= 'o';
            }

            if ($width !== self::MAX_WITDH) {
                $horizontalMovement .= ' - ';
            }
        }
        return $horizontalMovement;
    }
}
