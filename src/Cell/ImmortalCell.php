<?php

namespace RJozwiak\GameOfLifeKata\Cell;

use RJozwiak\GameOfLifeKata\Cell;

class ImmortalCell extends Cell
{
    /**
     * ImmortalCell constructor.
     */
    public function __construct()
    {
        parent::__construct(true);
    }

    /**
     * @internal
     */
    public function die() : void
    {
        // cannot die, because cell is immortal
    }

    /**
     * @internal
     */
    public function revive() : void
    {
        // cannot be revived, because cell is always alive
    }
}
