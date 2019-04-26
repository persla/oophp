<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Init game and redirect to play the game.
 */
$app->router->get("guess/init", function () use ($app) {
    // Init the seiion for the gamestart
    $game = new Persla\Guess\Guess();

    $_SESSION["number"] = $game->number();
    $_SESSION["tries"] = $game->tries();
    return $app->response->redirect("guess/play");
});



/**
 * Render the game status .
 */
$app->router->get("guess/play", function () use ($app) {
    //echo "Some debugging information";
    $title = "Play the game";
    $tries = $_SESSION["tries"] ?? null;
    $number = $_SESSION["number"] ?? null;
    $readonly = $_SESSION["readonly"] ?? null;
    $doCheat = $_SESSION["doCheat"] ?? null;
    $res = $_SESSION["res"] ?? null;
    $guess = $_SESSION["guess"] ?? null;
    $_SESSION["res"] = null;
    $_SESSION["guess"] = null;
    $_SESSION["doCheat"] = null;
    $_SESSION["readonly"] = null;

    $data = [
        "guess" => $guess ?? null,
        "res" => $res,
        "tries" => $tries,
        "number" => $number ?? null,
        "doGuess" => $doGuess ?? null,
        "doCheat" => $doCheat ?? null,
        "readonly" => $readonly ?? null,
    ];


    // $app->page->add("guess/debug");
    $app->page->add("guess/play", $data);
    // $app->page->add("guess/debug");

    return $app->page->render([
        "title" => $title,
    ]);
});
/**
 * Make a guess.
 */
$app->router->post("guess/play", function () use ($app) {
    //echo "Some debugging information";
    // $title = "Play the game";
    $guess = $_POST["guess"] ?? null;
    $doInit = $_POST["doInit"] ?? null;
    $doGuess = $_POST["doGuess"] ?? null;
    $doCheat = $_POST["doCheat"] ?? null;
    $number = $_SESSION["number"] ?? null;
    $tries = $_SESSION["tries"] ?? null;
    // $readonly = $_SESSION["readonly"] ?? null;
    $readonly = "disabled";

    if ($doGuess) {
        $game = new Persla\Guess\Guess($number, $tries);
        $res = $game->makeGuess($guess);
        $_SESSION["tries"] = $game->tries();
        $_SESSION["res"] = $res;
        $_SESSION["guess"] = $guess;
    }

    if ($doCheat) {
        $_SESSION["doCheat"] = $doCheat;
    }

    if ($doInit) {
        return $app->response->redirect("guess/init");
    }

    if ($tries == 1 || $guess == $number) {
        $_SESSION["readonly"] = $readonly;
    }

    return $app->response->redirect("guess/play");
});

// $app->router->post("guess/play", function () use ($app) {
//     //echo "Some debugging information";
//     $title = "Play the game";
//     $doCheat = $_POST["doCheat"] ?? null;
//
//     if ($doCheat) {
//         $_SESSION["doCheat"] = $doCheat;
//     }
//     return $app->response->redirect("guess/play");
// });


/**
* Showing message Hello World, rendered within the standard page layout.
 */
