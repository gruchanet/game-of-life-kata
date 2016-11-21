<?php

namespace RJozwiak\GameOfLifeKata;

class Game
{
    /**
     * @var array
     */
    private $grid;


    /**
     * Game constructor.
     * @param array $grid
     */
    public function __construct(array $grid)
    {
        $this->grid = $grid;
    }

    public function nextGeneration() : void
    {
        $newGrid = $this->grid;

        $xCount = count($this->grid);
        for ($i = 0; $i < $xCount; $i++) {
            $yCount = count($this->grid[$i]);
            for ($j = 0; $j < $yCount; $j++) {
                $aliveNeighbours = $this->aliveNeighbours($i, $j);
                if ($this->grid[$i][$j]) {
                    if ($aliveNeighbours < 2 || $aliveNeighbours > 3) {
                        $newGrid[$i][$j] = false;
                    }
                } else {
                    if ($aliveNeighbours == 3) {
                        $newGrid[$i][$j] = true;
                    }
                }
            }
        }

        $this->grid = $newGrid;
    }

    /**
     * @param int $x
     * @param int $y
     * @return int
     */
    private function aliveNeighbours(int $x, int $y) : int
    {
        $count = 0;

        if (isset($this->grid[$x - 1][$y]) && $this->grid[$x - 1][$y]) {
            $count++;
        }
        if (isset($this->grid[$x - 1][$y - 1]) && $this->grid[$x - 1][$y - 1]) {
            $count++;
        }
        if (isset($this->grid[$x][$y - 1]) && $this->grid[$x][$y - 1]) {
            $count++;
        }
        if (isset($this->grid[$x + 1][$y - 1]) && $this->grid[$x + 1][$y - 1]) {
            $count++;
        }
        if (isset($this->grid[$x + 1][$y]) && $this->grid[$x + 1][$y]) {
            $count++;
        }
        if (isset($this->grid[$x + 1][$y + 1]) && $this->grid[$x + 1][$y + 1]) {
            $count++;
        }
        if (isset($this->grid[$x][$y + 1]) && $this->grid[$x][$y + 1]) {
            $count++;
        }
        if (isset($this->grid[$x - 1][$y + 1]) && $this->grid[$x - 1][$y + 1]) {
            $count++;
        }

        return $count;
    }

    /**
     * @return array
     */
    public function grid() : array
    {
        return $this->grid;
    }
}
