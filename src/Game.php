<?php

namespace RJozwiak\GameOfLifeKata;

/**
 * Class Game
 * @package RJozwiak\GameOfLifeKata
 */
class Game
{
    /**
     * @var CellsGrid
     */
    private $cellsGrid;

    /**
     * Game constructor.
     * @param array $cellsGrid
     */
    public function __construct(array $cellsGrid)
    {
        $this->cellsGrid = CellsGridFactory::createFromArray($cellsGrid);
    }

    public function nextGeneration() : void
    {
        // TODO: issue with clone $this->cellsGrid
        $newCellsGrid = CellsGridFactory::createFromArray($this->cellsGrid->toArray());

        $height = $this->cellsGrid->height();
        for ($x = 0; $x < $height; $x++) {
            $width = $this->cellsGrid->width();
            for ($y = 0; $y < $width; $y++) {
                $aliveNeighbours = $this->cellsGrid->aliveNeighboursOfCellAt($x, $y);
                if ($this->cellsGrid->isCellAliveAt($x, $y)) {
                    if ($aliveNeighbours < 2 || $aliveNeighbours > 3) {
                        $newCellsGrid->diesAt($x, $y);
                    }
                } else {
                    if ($aliveNeighbours == 3) {
                        $newCellsGrid->reviveAt($x, $y);
                    }
                }
            }
        }

        $this->cellsGrid = $newCellsGrid;
    }

    /**
     * @return array
     */
    public function cellsGrid() : array
    {
        return $this->cellsGrid->toArray();
    }
}
