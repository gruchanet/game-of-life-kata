<?php

namespace spec\RJozwiak\GameOfLifeKata;

use RJozwiak\GameOfLifeKata\Cell;
use RJozwiak\GameOfLifeKata\Cell\NormalCell;
use RJozwiak\GameOfLifeKata\CellsGrid;
use PhpSpec\ObjectBehavior;

/**
 * Class CellsGridSpec
 * @package spec\RJozwiak\GameOfLifeKata
 * @mixin CellsGrid
 */
class CellsGridSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith([[]]);
        $this->shouldHaveType(CellsGrid::class);
    }

    function it_throws_exception_on_invalid_grid_cells_types()
    {
        $this->beConstructedWith([[\stdClass::class]]);

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function it_throws_exception_on_invalid_grid_cells_rows_width()
    {
        $this->beConstructedWith([
            [Cell::class],
            [Cell::class, Cell::class],
        ]);

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function its_specified_cell_dies()
    {
        $cell = new NormalCell(true);
        $this->beConstructedWith([[$cell]]);

//        $cell->die()->shouldBeCalled();

        $this->diesAt(0, 0);
        $this->isCellAliveAt(0, 0)->shouldBe(false);
    }

    function it_revives_specified_cell()
    {
        $cell = new NormalCell(false);
        $this->beConstructedWith([[$cell]]);

//        $cell->revive()->shouldBeCalled();

        $this->reviveAt(0, 0);
        $this->isCellAliveAt(0, 0)->shouldBe(true);
    }

    function it_returns_alive_neighbours_count_of_cell()
    {
        $grid = [
            [new NormalCell(true), new NormalCell(false), new NormalCell(true)],
            [new NormalCell(true), new NormalCell(true), new NormalCell(false)],
            [new NormalCell(false), new NormalCell(true), new NormalCell(true)]
        ];
        $this->beConstructedWith($grid);

        $this->aliveNeighboursOfCellAt(1, 1)->shouldBe(5);
    }

    function it_returns_correct_array_representation()
    {
        $grid = [
            [new NormalCell(true), new NormalCell(false)],
            [new NormalCell(false), new NormalCell(true)]
        ];
        $this->beConstructedWith($grid);

        $arrayGrid = [
            [true, false],
            [false, true]
        ];
        $this->toArray()->shouldReturn($arrayGrid);
    }

    function it_returns_correct_grid_height()
    {
        $grid = [
            [new NormalCell(true)],
            [new NormalCell(false)],
        ];
        $this->beConstructedWith($grid);

        $this->height()->shouldBe(2);
    }

    function it_returns_correct_grid_width()
    {
        $grid = [
            [new NormalCell(true), new NormalCell(false)],
        ];
        $this->beConstructedWith($grid);

        $this->width()->shouldBe(2);
    }
}
