<?php

namespace RJozwiak\GameOfLifeKata;

class Game
{
    /**
     * @var array
     */
    private $cellsGrid;


    /**
     * Game constructor.
     * @param array $cellsGrid
     */
    public function __construct(array $cellsGrid)
    {
        $this->cellsGrid = $cellsGrid;
    }

    public function nextGeneration() : void
    {
        $newCellsGrid = $this->cellsGrid;

        $xCount = count($this->cellsGrid);
        for ($i = 0; $i < $xCount; $i++) {
            $yCount = count($this->cellsGrid[$i]);
            for ($j = 0; $j < $yCount; $j++) {
                $aliveNeighbours = $this->aliveNeighbours($i, $j);
                if ($this->cellsGrid[$i][$j]) {
                    if ($aliveNeighbours < 2 || $aliveNeighbours > 3) {
                        $newCellsGrid[$i][$j] = false;
                    }
                } else {
                    if ($aliveNeighbours == 3) {
                        $newCellsGrid[$i][$j] = true;
                    }
                }
            }
        }

        $this->cellsGrid = $newCellsGrid;
    }

    /**
     * @param int $x
     * @param int $y
     * @return int
     */
    private function aliveNeighbours(int $x, int $y) : int
    {
        $count = 0;

        if (isset($this->cellsGrid[$x - 1][$y]) && $this->cellsGrid[$x - 1][$y]) {
            $count++;
        }
        if (isset($this->cellsGrid[$x - 1][$y - 1]) && $this->cellsGrid[$x - 1][$y - 1]) {
            $count++;
        }
        if (isset($this->cellsGrid[$x][$y - 1]) && $this->cellsGrid[$x][$y - 1]) {
            $count++;
        }
        if (isset($this->cellsGrid[$x + 1][$y - 1]) && $this->cellsGrid[$x + 1][$y - 1]) {
            $count++;
        }
        if (isset($this->cellsGrid[$x + 1][$y]) && $this->cellsGrid[$x + 1][$y]) {
            $count++;
        }
        if (isset($this->cellsGrid[$x + 1][$y + 1]) && $this->cellsGrid[$x + 1][$y + 1]) {
            $count++;
        }
        if (isset($this->cellsGrid[$x][$y + 1]) && $this->cellsGrid[$x][$y + 1]) {
            $count++;
        }
        if (isset($this->cellsGrid[$x - 1][$y + 1]) && $this->cellsGrid[$x - 1][$y + 1]) {
            $count++;
        }

        return $count;
    }

    /**
     * @return array
     */
    public function cellsGrid() : array
    {
        return $this->cellsGrid;
    }
}
