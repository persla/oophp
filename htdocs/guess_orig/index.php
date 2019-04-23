<?php
require __DIR__ . '/config.php';
require __DIR__ . '/autoload.php';

session_name("persla");
session_start();

$guess = $_POST["guess"] ?? null;
$doInit = $_POST["doInit"] ?? null;
$doGuess = $_POST["doGuess"] ?? null;
$doCheat = $_POST["doCheat"] ?? null;
$number = $_SESSION["number"] ?? null;
$tries = $_SESSION["tries"] ?? null;
$game = null;
$readonly = "";
// $msg = "";
//
// if($doGuess != null && is_string($guess)) {
//     $msg = '<span class="error"> Please enter a value</span>';
// } else if($doGuess != null && ! filter_var($guess, FILTER_VALIDATE_INT) ) {
//     $msg = '<span class="error"> Data entered was not numeric</span>';
//     }

// End the game, formelement set to disable
// if ($_SESSION["tries"] == 1) {
//     $readonly = "disabled";
// }

//initiate a new game with setters if doInit button is pushed och the seacret number is null
if ($doInit || $number === null) {
    $game = new Guess();

    $_SESSION["number"] = $game->number();
    $_SESSION["tries"] = $game->tries();
//continues the game with constructor
} elseif ($doGuess) {
    $game = new Guess($number, $tries);
    $res = $game->makeGuess($guess);
    $_SESSION["tries"] = $game->tries();
}

require __DIR__ . '/view/guess_my_number.php';
