<?php

namespace Persla\Hundred;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class HundredTest extends TestCase
{
    /**
     * Just assert something is true.
     */
    public function testTrue()
    {
        $this->assertTrue(true);
    }

    public function testRollMethod()
    {
        $game = new GameController();
        $this->assertInstanceOf("\Persla\Hundred\GameController", $game);

        $res = $game->roll(6);
        $exp = array_values($res);
        $this->assertEquals($exp, $res);
    }

    public function testValuesMethod()
    {
        $game = new GameController();
        $this->assertInstanceOf("\Persla\Hundred\GameController", $game);

        $res = $game->roll(2);
        $exp = $game->values();
        $this->assertEquals($exp, $res);
    }

    public function testSumOfDicesThrownMethod()
    {
        $game = new GameController();
        $this->assertInstanceOf("\Persla\Hundred\GameController", $game);
        $game->roll(2);
        $res = $game->sumOfDicesThrown();

        $exp = array_sum($game->values());
        $this->assertEquals($exp, $res);
    }

    public function testOfTotalScoreRoundMethod()
    {
        $game = new GameController();
        $this->assertInstanceOf("\Persla\Hundred\GameController", $game);
        $game->roll(2);
        $res = $game->totalScoreRound();
        if (in_array(1, $game->values())) {
            $exp = 0;
        } elseif (!in_array(1, $game->values())) {
            $exp = $game->valuesTotalScoreRound();
        }
        $this->assertEquals($exp, $res);
    }

    public function testValuesTotaleScoreRoundMethod()
    {
        $game = new GameController();
        $this->assertInstanceOf("\Persla\Hundred\GameController", $game);
        $game->roll(6);
        $res = $game->totalScoreRound();
        $exp = $game->valuesTotalScoreRound();
        $this->assertEquals($exp, $res);
    }

    public function testValuesTotaleScorePlayerMethod()
    {
        $game = new GameController();
        $this->assertInstanceOf("\Persla\Hundred\GameController", $game);
        $game->roll(4);
        $res = $game->totalScorePlayer();
        $exp = $game->valuesTotalScorePlayer();
        $this->assertEquals($exp, $res);
    }
}
