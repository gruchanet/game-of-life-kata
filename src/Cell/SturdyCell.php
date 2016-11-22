<?php

namespace RJozwiak\GameOfLifeKata\Cell;

use RJozwiak\GameOfLifeKata\Cell;

class SturdyCell extends Cell
{
    const MAX_LIVES = 3;

    /** @var int */
    private $livesLeft = 0;

    /**
     * SturdyCell constructor.
     * @param bool $alive
     */
    public function __construct($alive)
    {
        parent::__construct($alive);
        $this->resetLivesLeftIfAlive();
    }

    private function resetLivesLeftIfAlive() : void
    {
        if ($this->alive) {
            $this->livesLeft = self::MAX_LIVES;
        }
    }

    /**
     * @internal
     */
    public function die() : void
    {
        $this->livesLeft--;

        if ($this->livesLeft == 0) {
            $this->alive = false;
        }
    }

    /**
     * @internal
     */
    public function revive() : void
    {
        $this->alive = true;
        $this->resetLivesLeftIfAlive();
    }

    /**
     * @return int
     */
    public function livesLeft() : int
    {
        return $this->livesLeft;
    }
}
