<?php
namespace Persla\Hundred;

/**
 * A dicehand, consisting of dices.
 */
class DiceHand
{
    /**
     * @var Dice $dices   Array consisting of dices.
     * @var int  $values  Array consisting of last roll of the dices.
     */
    // private $dices;
    private $values;
    private $sum_of_dices_thrown_current_round;
    private $total_score_current_round = [];
    private $total_score_player = [];
    private $dice_trown;



    /**
     * Constructor to initiate the dicehand with a number of dices.
     *
     * @param int $dices Number of dices to create, defaults to five.
     */

    public function roll(int $dice_trown = 2)
    {
        $this->values = [];
        for ($i = 0; $i < $dice_trown; $i++) {
            $this->values[] = rand(1, 6);
        }
        return $this->values;
    }

    public function sum_of_dices_thrown()
    {
        $this->sum_of_dices_thrown_current_round = array_sum($this->values);
        return $this->sum_of_dices_thrown_current_round;
    }

    public function total_score_round()
    {
        // $this->total_score_current_round = [];
        if (in_array(1, $this->values)) {
            $this->total_score_current_round = [];
            return (array_sum($this->total_score_current_round));
        } else {
            array_push($this->total_score_current_round, $this->sum_of_dices_thrown());
            return (array_sum($this->total_score_current_round));
        }
    }

    public function total_score_player()
    {
        array_push($this->total_score_player, array_sum($this->total_score_current_round));
        $this->total_score_current_round = [];
        return (array_sum($this->total_score_player));
    }
}
