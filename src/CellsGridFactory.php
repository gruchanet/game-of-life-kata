<?php

namespace RJozwiak\GameOfLifeKata;

use RJozwiak\GameOfLifeKata\Cell\NormalCell;

/**
 * Class CellsGridFactory
 * @package RJozwiak\GameOfLifeKata
 */
class CellsGridFactory
{
    /**
     * @param array $grid
     * @return CellsGrid
     */
    public static function createFromArray(array $grid)
    {
        $cells = [];

        $height = count($grid);
        $width = $height > 0 ? count($grid[0]) : 0;

        for ($x = 0; $x < $height; $x++) {
            for ($y = 0; $y < $width; $y++) {
                // TODO: for know NormalCell is hardcoded
                $cells[$x][$y] = new NormalCell($grid[$x][$y]);
            }
        }

        return self::create($cells);
    }

    /**
     * @param Cell[][] $grid
     * @return CellsGrid
     */
    public static function create(array $grid)
    {
        return new CellsGrid($grid);
    }
}
