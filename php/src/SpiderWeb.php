<?php

namespace SpiderKata;

class SpiderWeb
{
    private const MAX_HEIGHT = 5;
    private const MAX_WITDH = 4;
    private const MIN_HEIGHT = 0;
    private const MIN_WITDH = 0;

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

    public function distance(Coordinate $coordinate, Coordinate $secondCoordinate): float
    {
        return sqrt(pow($coordinate->x() - $secondCoordinate->x(), 2) + pow($coordinate->y() - $secondCoordinate->y(), 2));
    }
}
