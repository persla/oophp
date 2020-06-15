<?php
namespace Persla\Hundred;

/**
 * Controller for the game first to hundred .
 */
class GameController extends Dice
{
    use HistogramTrait;
    /**
     *
     */
    protected $values;
    protected $sumOfDicesCurrentRound;
    protected $totalScoreCurrentRound = [];
    protected $totalScorePlayer = [];
    public static $myVar = [1, 2, 9];
    // private $dicesrolled;

    /**
     *
     *
     * @param int $dicesrolled Number of dices to create, defaults to two.
     * $this->values contains the dice from the last roll
     */

    public function roll(int $dicesrolled = 2)
    {
        // $oneDice = new Dice();
        $this->values = [];
        for ($i = 0; $i < $dicesrolled; $i++) {
            // $this->values[] = rand(1, 6);
            $this->values[] = parent::roll();
        }
        // $testa = 99;
        // GameController::totalDices1($testa);
        // array_push($this->serie, 1, 2, 3, 4);
        $this->setSomestuff($this->values);
        return $this->values;
    }
    // public function roll()
    // {
    //     $this->serie[] = parent::roll();
    //     return $this->getLastRoll();
    // }




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
        // GameController::$myVar = $this->totalScorePlayer;


        return array_sum($this->totalScorePlayer);
    }

    public static function totalDices1($testa){
        // self::$myVar = $totaldices;
        array_push(self::$myVar, $testa);
        return self::$myVar;
        // array_push(self::$myVar, $test); //This will assign the value to the static variable $myVar
        // return self::$myVar; //This prints the value of static variable $myVar
        // GameController::printHello();
    }

    public static function totalDices(){
        // self::$myVar = $totaldices;
        // array_push(self::$myVar, $this->values());
        // array_push(self::$myVar, "apple", "raspberry"); //This will assign the value to the static variable $myVar
        return self::$myVar; //This prints the value of static variable $myVar
        // GameController::totalDices();
    }
}
