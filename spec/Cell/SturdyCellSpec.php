<?php

namespace spec\RJozwiak\GameOfLifeKata\Cell;

use RJozwiak\GameOfLifeKata\Cell;
use RJozwiak\GameOfLifeKata\Cell\SturdyCell;
use PhpSpec\ObjectBehavior;

/**
 * Class SturdyCellSpec
 * @package spec\RJozwiak\GameOfLifeKata\Cell
 * @mixin SturdyCell
 */
class SturdyCellSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(true);
        $this->shouldHaveType(SturdyCell::class);
        $this->shouldImplement(Cell::class);
    }

    function it_has_3_lives_at_the_beginning_if_it_is_alive()
    {
        $this->beConstructedWith(true);

        $this->livesLeft()->shouldBe(3);
        $this->isAlive()->shouldBe(true);
    }

    function it_has_0_lives_at_the_beginning_if_it_is_dead()
    {
        $this->beConstructedWith(false);

        $this->livesLeft()->shouldBe(0);
        $this->isAlive()->shouldBe(false);
    }

    function it_gets_3_lives_after_revival()
    {
        $this->beConstructedWith(false);

        $this->revive();

        $this->livesLeft()->shouldBe(3);
        $this->isAlive()->shouldBe(true);
    }

    function it_loses_life_on_suicide_attempt_if_it_has_more_than_1_life()
    {
        $this->beConstructedWith(true);

        $this->die();
        $this->livesLeft()->shouldBe(2);

        $this->die();
        $this->livesLeft()->shouldBe(1);
    }

    function it_dies_when_on_suicide_attempt_if_it_has_just_1_life()
    {
        $this->beConstructedWith(true);

        $this->die();
        $this->die();
        $this->die();

        $this->livesLeft()->shouldBe(0);
        $this->isAlive()->shouldBe(false);
    }
}
