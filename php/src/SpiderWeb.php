<?php

namespace SpiderKata;

class SpiderWeb
{
    public function exceedLimit(Coordinate $coordinate): bool
    {
        if ($coordinate->x() >= 5 || $coordinate->x() < 0 || $coordinate->y() >= 6 || $coordinate->y() < 0) {
            return true;
        }
        return false;
    }
}
