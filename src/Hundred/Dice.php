<?php
namespace Persla\Hundred;

/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */

class Dice
{
    // private $lastRoll;

    public function __construct()
    {
        $number = rand(1, 6);
        $this->number = $number;
    }

    public function rollOneDice()
    {
        $number = rand(1, 6);
        $this->number = $number;
        return $this->number;
    }

    // public function getLastRoll()
    // {
    //     $this->lastRoll = $this->number;
    //     return $this->lastRoll;
    // }
}


// class DiceHands
// {
//
//     private $dices = [];
//     private $antal = 1;
//
//
//     public function __construct()
//     {
//         for ($x = 0; $x <= 5; $x++) {
//         $this->dices[$x] = new Dice();
//         }
//     }
//
//     public function roll()
//     {
//         $res= "";
//         foreach ($this->dices as $i => $i_value) {
//              $res .=  "Tärning {$this->antal} visar {$i_value->number}.\n";
//              ++$this->antal;
//         }
//             return $res;
//     }
// }
