<?php

namespace SpiderKata;

class SpiderWeb
{
    public function exceedLimit(Coordinate $coordinate): bool
    {
        if ($coordinate->x() >= 5) {
            return true;
        }
        return false;
    }
}
