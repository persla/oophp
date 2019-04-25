<?php
namespace Persla\Guess;

/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */
    private $number = null;
    private $tries = 6;


    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the current number if no value is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */

    public function __construct(int $number = -1, int $tries = 6)
    {
        $this->tries = $tries;
        if ($number === -1) {
            $number = rand(1, 100);
        }
        $this->number = $number;
    }




    /**
     * Randomize the secret number between 1 and 100 to initiate a new game.
     *
     * @return void
     */

    public function random() : void
    {
        $this->number = rand(1, 100);
    }




    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */

    public function tries() : int
    {
        return $this->tries;
    }

    /**
     * Function to end the game
     *
     * @return string disable to from elements if tries == 0.
     */

    public function endGame() : string
    {
        $readonly = "";

        if ($_SESSION["tries"] == 0) {
            $readonly = "disabled";
        }

        return $readonly;
    }


    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */

    public function number() : int
    {
        return $this->number;
    }

    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or to high or if no guesses remains.
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return string to show the status of the guess made.
     */

    public function makeGuess(int $guess) : string
    {
        if ($guess < 1 || $guess > 100) {
            throw new GuessException("Number is out of bounds.");
        }
        $this->tries -=1;
        if (0 == $this->tries) {
            $res = " wrong and your guesses are over! The right number was {$this->number}.
            Click the <i>Start over</i> button to start a new game.";
            $this->endGame();
        } elseif ($guess === $this->number) {
            $res = "CORRECT!";
        } elseif ($guess > $this->number) {
            $res = "TO HIGH!";
        } else {
            $res = "TO LOW!";
        }
        return $res;
    }
}
