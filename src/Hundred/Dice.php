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

// public function printHistogram(int $min = null, int $max = null)
//     {
//         $history = array_count_values($this->serie);
//         $string = "";
//         foreach ( $history as $key=>$item ) {
//             $string .= "$key: ";
//             $string .= str_repeat("*", $item);
//             $string .= "<br>";
//         }
//         return $string;
//     }ksort()???
