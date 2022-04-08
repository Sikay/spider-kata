<?php

namespace SpiderKata;

class SpiderWeb
{
    public function exceedLimit(Coordinate $coordinate): bool
    {
        if ($coordinate->x() >= 5 || $coordinate->y() >=6) {
            return true;
        }
        return false;
    }
}
