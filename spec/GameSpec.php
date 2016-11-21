<?php

namespace spec\RJozwiak\GameOfLifeKata;

use RJozwiak\GameOfLifeKata\Game;
use PhpSpec\ObjectBehavior;

/**
 * Class GameSpec
 * @package spec\RJozwiak\GameOfLifeKata
 * @mixin Game
 */
class GameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Game::class);
    }

    function it_returns_initialized_grid()
    {
        $this->grid()->shouldBe([]);
    }

    function it_alive_cells_should_die_in_next_generation_caused_by_underpopulation()
    {
        $initialGrid = [
            [false, false, false],
            [false, true, false],
            [false, false, false]
        ];

        $nextGenerationGrid = [
            [false, false, false],
            [false, false, false],
            [false, false, false]
        ];

        $this->assertValidNextGeneration($initialGrid, $nextGenerationGrid);
    }

    function it_alive_cells_should_die_in_next_generation_caused_by_overcrowding()
    {
        $initialGrid = [
            [true, true, true],
            [false, true, false],
            [true, true, true]
        ];

        $nextGenerationGrid = [
            [true, true, true],
            [false, false, false],
            [true, true, true]
        ];

        $this->assertValidNextGeneration($initialGrid, $nextGenerationGrid);
    }

    function it_alive_cells_with_2_or_3_neighbours_should_stay_alive_to_next_generation()
    {
        $initialGrid = [
            [true, true, true, true],
            [true, false, false, true],
            [false, false, false, false]
        ];

        $nextGenerationGrid = [
            [true, true, true, true],
            [true, false, false, true],
            [false, false, false, false]
        ];

        $this->assertValidNextGeneration($initialGrid, $nextGenerationGrid);
    }

    function it_dead_cells_with_3_neighbours_should_become_alive_in_next_generation()
    {
        $initialGrid = [
            [true, true],
            [true, false]
        ];

        $nextGenerationGrid = [
            [true, true],
            [true, true]
        ];

        $this->assertValidNextGeneration($initialGrid, $nextGenerationGrid);
    }

    private function assertValidNextGeneration($initialGrid, $nextGenerationGrid)
    {
        $this->beConstructedWith($initialGrid);
        $this->nextGeneration();
        $this->grid()->shouldBe($nextGenerationGrid);
    }
}
