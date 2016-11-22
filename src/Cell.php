<?php

namespace RJozwiak\GameOfLifeKata;

/**
 * Class Cell
 * @package RJozwiak\GameOfLifeKata
 * @internal
 */
abstract class Cell
{
    /** @var bool */
    protected $alive;

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
    abstract public function die() : void;

    /**
     * @internal
     */
    abstract public function revive() : void;

    /**
     * @return bool
     */
    public function isAlive() : bool
    {
        return $this->alive;
    }
}
