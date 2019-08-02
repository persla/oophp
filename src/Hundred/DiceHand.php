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
    private $dices;
    private $values;
    private $res;

    /**
     * Constructor to initiate the dicehand with a number of dices.
     *
     * @param int $dices Number of dices to create, defaults to five.
     */
    public function __construct(int $dices = 2)
    {
        $this->dices  = [];
        $this->values = [];

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[]  = new Dice();
            $this->values[] = null;
        }
    }

    /**
     * Roll all dices save their value.
     *
     * @return void.
     */

    /**
     * Get values of dices from last roll.
     *
     * @return array with values of the last roll.
     */
    public function roll()
    {
        foreach ($this->dices as $iValue) {
             $this->res[] = $iValue->number;
        }
            return $this->res;
    }

    public function values()
    {
        return $this->res;
    }

    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function sum()
    {

        return (array_sum($this->res));
    }

    /**
     * Get the average of all dices.
     *
     * @return float as the average of all dices.
     */
    public function average()
    {
        return (array_sum($this->res))/count($this->res);
    }
}
