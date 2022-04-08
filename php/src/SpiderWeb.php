<?php

namespace SpiderKata;

class SpiderWeb
{
    private const MAX_HEIGHT = 5;
    private const MAX_WITDH = 4;
    private const MIN_HEIGHT = 0;
    private const MIN_WITDH = 0;

    public function exceedLimit(Coordinate $coordinate): bool
    {
        if (self::exceedWidthLimit($coordinate->x()) || self::exceedHeightLimit($coordinate->y())) {
            return true;
        }
        return false;
    }

    private static function exceedWidthLimit(int $width): bool
    {
        if ($width > self::MAX_WITDH || $width < self::MIN_WITDH) {
            return true;
        }
        return false;
    }

    private static function exceedHeightLimit(int $height): bool
    {
        if ($height > self::MAX_HEIGHT || $height < self::MIN_HEIGHT) {
            return true;
        }
        return false;
    }
}
