<?php

namespace spec\RJozwiak\GameOfLifeKata\Cell;

use RJozwiak\GameOfLifeKata\Cell;
use RJozwiak\GameOfLifeKata\Cell\NormalCell;
use PhpSpec\ObjectBehavior;

/**
 * Class CellSpec
 * @package spec\RJozwiak\GameOfLifeKata
 * @mixin NormalCell
 */
class NormalCellSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(true);
        $this->shouldHaveType(NormalCell::class);
        $this->shouldImplement(Cell::class);
    }

    function it_can_die()
    {
        $this->beConstructedWith(true);

        $this->die();
        $this->isAlive()->shouldBe(false);
    }

    function it_can_revive_itself()
    {
        $this->beConstructedWith(false);

        $this->revive();
        $this->isAlive()->shouldBe(true);
    }
}
