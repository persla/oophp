<?php
namespace Persla\Hundred;

/**
 * Controller for the game first to hundred .
 */
class GameController
{
    /**
     *
     */
    private $values;
    private $sumOfDicesCurrentRound;
    private $totalScoreCurrentRound = [];
    private $totalScorePlayer = [];
    // private $dicesrolled;

    /**
     *
     *
     * @param int $dicesrolled Number of dices to create, defaults to two.
     * $this->values contains the dice from the last roll
     */

    public function roll(int $dicesrolled = 2)
    {
        $oneDice = new Dice();
        $this->values = [];
        for ($i = 0; $i < $dicesrolled; $i++) {
            // $this->values[] = rand(1, 6);
            $this->values[] = $oneDice->rollOneDice();
        }
        return $this->values;
    }
    public function values()
    {
        return $this->values;
    }
    /**
     *  Method that sums up the value of the latest dice roll
     */
    public function sumOfDicesThrown()
    {
        $this->sumOfDicesCurrentRound = array_sum($this->values());
        return $this->sumOfDicesCurrentRound;
    }

    /**
     *  Method that sums up the value of the latest round
     */
    public function totalScoreRound()
    {
        // $this->totalScoreCurrentRound = [];
        if (in_array(1, $this->values)) {
            $this->totalScoreCurrentRound = [];
            return array_sum($this->totalScoreCurrentRound);
        } else {
            array_push($this->totalScoreCurrentRound, $this->sumOfDicesThrown());
            return array_sum($this->totalScoreCurrentRound);
        }
    }
    public function valuesTotalScoreRound()
    {
        return array_sum($this->totalScoreCurrentRound);
    }


    public function totalScorePlayer()
    {
        array_push($this->totalScorePlayer, array_sum($this->totalScoreCurrentRound));
        $this->totalScoreCurrentRound = [];
        return (array_sum($this->totalScorePlayer));
    }
    public function valuesTotalScorePlayer()
    {
        return array_sum($this->totalScorePlayer);
    }
}
