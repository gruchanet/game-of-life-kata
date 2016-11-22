<?php

namespace RJozwiak\GameOfLifeKata\Cell;

use RJozwiak\GameOfLifeKata\Cell;

class NormalCell extends Cell
{
    /**
     * @internal
     */
    public function die() : void
    {
        $this->alive = false;
    }

    /**
     * @internal
     */
    public function revive() : void
    {
        $this->alive = true;
    }
}
