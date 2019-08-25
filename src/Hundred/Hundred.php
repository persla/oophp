<?php
namespace Persla\Hundred;

/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
// class Hundred
// {
//
//         /**
//          * @var int dice_1     Holds value of dice-1.
//          * @var int dice_2     Holds value of dice-2.
//          * @var int sum_of_dices_thrown_current_round     Sum of throw.
//          * @var int total score                           Total score.
//          */
//
//         private $dice_1;
//         private $dice_2;
//         private $sum_of_dices_thrown_current_round;
//         private $total_score = [];
//
//         /**
//          * Constructor to initiate the object with current game settings,
//          * if available. Randomize the current number if no value is sent in.
//          */
//
//         public function __construct()
//         {
//             $this->dice_1;
//             $this->dice_2;
//             $this->sum_of_dices_thrown_current_round;
//             $this->total_score;
//         }
//
//         public function roll_dice_1()
//         {
//         $this->dice_1 = rand(1, 6);
//         return $this->dice_1;
//         }
//
//         public function roll_dice_2()
//         {
//         $this->dice_2 = rand(1, 6);
//         return $this->dice_2;
//         }
//
//         public function sum_of_dices_thrown()
//         {
//             $this->sum_of_dices_thrown_current_round = $this->dice_1 + $this->dice_2;
//             return $this->sum_of_dices_thrown_current_round;
//         }
//
//         public function total_score()
//         {
//             array_push($this->total_score, $this->sum_of_dices_thrown_current_round);
//             return $this->total_score;
//         }
// }
//
//
//
//
// public function roll()
//     {
//         for ($i = 0; $i < 2; $i++) {
//             $this->values[] = rand(1, 6);
//         }
//         return $this->values;
//     }
//
//
//     namespace Inla18\Dice;
//
//     include_once(__DIR__ . "/Dice.php");
//     include_once(__DIR__ . "/DiceHand.php");

    // class DiceComputer extends Dicehand
    // {
    //     // private $sumComp;
    //     private $totalComp;
    //     private $runTime;
    //     private $throwOne;
    //     private $throwTwo;
    //     private $throwThree;
    //
    //     public function __construct(int $runTime = 3)
    //     {
    //         parent::__construct();
    //         // $this->sumComp = parent::$values;
    //         $this->totalComp = 0;
    //         $this->runTime = $runTime;
    //         $this->throwOne = 0;
    //         $this->throwTwo = 0;
    //         $this->throwThree = 0;
    //     }
