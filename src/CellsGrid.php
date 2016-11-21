<?php

namespace RJozwiak\GameOfLifeKata;

use RJozwiak\GameOfLifeKata\Cell\Exception\CellNotFoundException;

/**
 * Class CellsGrid
 * @package RJozwiak\GameOfLifeKata
 * @internal
 */
class CellsGrid
{
    /** @var Cell[][] */
    private $cellsGrid;

    /** @var int */
    private $height = 0;

    /** @var int */
    private $width = 0;

    /**
     * CellsGrid constructor.
     * @param Cell[][] $grid
     * @throws \InvalidArgumentException
     */
    public function __construct(array $grid)
    {
        $this->setCellsGrid($grid);
    }

    /**
     * @param Cell[][] $cellsGrid
     * @throws \InvalidArgumentException
     */
    private function setCellsGrid(array $cellsGrid) : void
    {
        $this->height = count($cellsGrid);
        $this->width = $this->height > 0 ? count($cellsGrid[0]) : 0;

        for ($x = 0; $x < $this->height; $x++) {
            if (count($cellsGrid[$x]) !== $this->width) {
                throw new \InvalidArgumentException('All cells rows must be of same width.');
            }

            for ($y = 0; $y < $this->width; $y++) {
                if (!$cellsGrid[$x][$y] instanceof Cell) {
                    throw new \InvalidArgumentException(
                        sprintf('At least one of grid cells is not instance of "%s" class.', Cell::class)
                    );
                }
            }
        }

        $this->cellsGrid = $cellsGrid;
    }

    /**
     * @return int
     */
    public function height() : int
    {
        return $this->height;
    }

    /**
     * @return int
     */
    public function width() : int
    {
        return $this->width;
    }

    /**
     * @param int $x
     * @param int $y
     * @throws CellNotFoundException
     */
    public function diesAt(int $x, int $y) : void
    {
        $this->throwExceptionIfCellNotExists($x, $y);

        $this->cellsGrid[$x][$y]->die();
    }

    /**
     * @param int $x
     * @param int $y
     * @throws CellNotFoundException
     */
    public function reviveAt(int $x, int $y) : void
    {
        $this->throwExceptionIfCellNotExists($x, $y);

        $this->cellsGrid[$x][$y]->revive();
    }

    /**
     * @param int $x
     * @param int $y
     * @return int
     * @throws CellNotFoundException
     */
    public function aliveNeighboursOfCellAt(int $x, int $y) : int
    {
        $this->throwExceptionIfCellNotExists($x, $y);

        $minX = min($x + 1, $this->height - 1);
        $maxX = max($x - 1, 0);
        $minY = min($y + 1, $this->width - 1);
        $maxY = max($y - 1, 0);

        $count = 0;
        for ($dx = $maxX; $dx <= $minX; $dx++) {
            for ($dy = $maxY; $dy <= $minY; $dy++) {
                if (!($dx == $x && $dy == $y) && $this->cellsGrid[$dx][$dy]->isAlive()) {
                    $count++;
                }
            }
        }

        return $count;
    }

    /**
     * @param int $x
     * @param int $y
     * @return bool
     * @throws CellNotFoundException
     */
    public function isCellAliveAt(int $x, int $y) : bool
    {
        $this->throwExceptionIfCellNotExists($x, $y);

        return $this->cellsGrid[$x][$y]->isAlive();
    }

    /**
     * @param int $x
     * @param int $y
     * @throws CellNotFoundException
     */
    private function throwExceptionIfCellNotExists(int $x, int $y) : void
    {
        if (!isset($this->cellsGrid[$x][$y])) {
            throw new CellNotFoundException(
                sprintf('No cell is defined at (%s, %s).', $x, $y)
            );
        }
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        $grid = [];

        for ($x = 0; $x < $this->height; $x++) {
            for ($y = 0; $y < $this->width; $y++) {
                $grid[$x][$y] = $this->cellsGrid[$x][$y]->isAlive();
            }
        }

        return $grid;
    }
}
