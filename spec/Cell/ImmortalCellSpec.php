<?php

namespace spec\RJozwiak\GameOfLifeKata\Cell;

use RJozwiak\GameOfLifeKata\Cell;
use RJozwiak\GameOfLifeKata\Cell\ImmortalCell;
use PhpSpec\ObjectBehavior;

/**
 * Class ImmortalCellSpec
 * @package spec\RJozwiak\GameOfLifeKata\Cell
 * @mixin ImmortalCell
 */
class ImmortalCellSpec extends ObjectBehavior
{
    function let()
    {
//        $this->beConstructedWith();
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ImmortalCell::class);
        $this->shouldImplement(Cell::class);
    }

    function it_is_alive_from_beginning()
    {
        $this->isAlive()->shouldBe(true);
    }

    function it_cannot_die()
    {
        $this->die();

        $this->isAlive()->shouldBe(true);
    }
}
