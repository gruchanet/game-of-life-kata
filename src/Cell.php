<?php

namespace RJozwiak\GameOfLifeKata;

/**
 * Class Cell
 * @package RJozwiak\GameOfLifeKata
 * @internal
 */
class Cell
{
    /** @var bool */
    private $alive;

    /**
     * Cell constructor.
     * @param bool $alive
     */
    public function __construct(bool $alive)
    {
        $this->alive = $alive;
    }

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

    /**
     * @return bool
     */
    public function isAlive() : bool
    {
        return $this->alive;
    }
}
