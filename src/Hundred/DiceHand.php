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
    // private $values;
    // private $res;
    // private $total_score;
    private $dice_1;
    private $dice_2;
    private $sum_of_dices_thrown_current_round;
    private $total_score_current_round = [];
    private $total_score = [];

    /**
     * Constructor to initiate the dicehand with a number of dices.
     *
     * @param int $dices Number of dices to create, defaults to five.
     */
    // public function __construct(int $dices = 2)
    // {
    //     $this->dices  = [];
    //     $this->values = [];
    //
    //     for ($i = 0; $i < $dices; $i++) {
    //         $this->dices[]  = new Dice();
    //         $this->values[] = null;
    //     }
    // }
    // public function roll_dice_1(int $times = 1)
    // {
    //     $this->dice_1 = [];
    //     for ($i = 0; $i < $times; $i++) {
    //            $this->dice_1[] = rand(1, 6);
    //        }
    //        return $this->dice_1;
    //        return array_sum($this->dice_1);
    // }



    public function roll_dice_1()
    {
    $this->dice_1 = 0;
    $this->dice_1 = rand(1, 6);
    return $this->dice_1;
    }

    public function roll_dice_2()
    {
    $this->dice_2 = 0;
    $this->dice_2 = rand(1, 6);
    return $this->dice_2;
    }

    public function sum_of_dices_thrown()
    {
        $this->sum_of_dices_thrown_current_round = $this->dice_1 + $this->dice_2;
        return $this->sum_of_dices_thrown_current_round;
    }

    public function total_score_round()
    {
        if ($this->dice_1 == 1 || $this->dice_2 == 1 ) {
            $this->total_score_current_round = [];
            return (array_sum($this->total_score_current_round));
        } else {
            array_push($this->total_score_current_round, $this->sum_of_dices_thrown());
            return (array_sum($this->total_score_current_round));
        }
    }

    public function total_score()
    {
        array_push($this->total_score, array_sum($this->total_score_current_round));
        $this->total_score_current_round = [];
        return (array_sum($this->total_score));
    }

    // /**
    //  * Roll all dices save their value.
    //  *
    //  * @return void.
    //  */
    //
    // /**
    //  * Get values of dices from last roll.
    //  *
    //  * @return array with values of the last roll.
    //  */
    // public function roll()
    // {
    //     foreach ($this->dices as $iValue) {
    //          $this->res[] = $iValue->number;
    //     }
    //         return $this->res;
    // }
    //
    // public function values()
    // {
    //     return $this->res;
    // }
    //
    // /**
    //  * Get the sum of all dices.
    //  *
    //  * @return int as the sum of all dices.
    //  */
    // public function sum()
    // {
    //
    //     return (array_sum($this->res));
    // }
    //
    // /**
    //  * Get the average of all dices.
    //  *
    //  * @return float as the average of all dices.
    //  */
    // public function average()
    // {
    //     return (array_sum($this->res))/count($this->res);
    // }
    //
    // public function total_score()
    // {
    //     $this->total_score  = [];
    //     array_push($this->total_score, $this->sum());
    //     return (array_sum($this->total_score));
    // }


}

// class DiceRoundScore extends DiceHand
// {
//     private $total_score;
//     public function total_score()
//     {
//         $this->total_score  = [];
//         array_push($this->total_score, $this->sum());
//         return (array_sum($this->total_score));
//     }
// }
