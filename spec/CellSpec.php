<?php

namespace spec\RJozwiak\GameOfLifeKata;

use RJozwiak\GameOfLifeKata\Cell;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class CellSpec
 * @package spec\RJozwiak\GameOfLifeKata
 * @mixin Cell
 */
class CellSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(true);
        $this->shouldHaveType(Cell::class);
    }

    function it_can_revive_itself()
    {
        $this->beConstructedWith(false);

        $this->revive();
        $this->isAlive()->shouldBe(true);
    }

    function it_can_die()
    {
        $this->beConstructedWith(true);

        $this->die();
        $this->isAlive()->shouldBe(false);
    }
}
