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
 * Play the game.
 */
$app->router->get("guess/play", function () use ($app) {
    //echo "Some debugging information";
    $title = "Play the game";
    // $data = [
    //     "who" => "Batman",
    // ];
    $guess = $_POST["guess"] ?? null;
    $doInit = $_POST["doInit"] ?? null;
    $doGuess = $_POST["doGuess"] ?? null;
    $doCheat = $_POST["doCheat"] ?? null;
    $number = $_SESSION["number"] ?? null;
    $tries = $_SESSION["tries"] ?? null;
    // $game = null;
    $res= null;
    $readonly = "";

    if ($tries == 0) {
        $readonly = "disabled";
    }

    if ($doGuess) {
       $game = new Persla\Guess\Guess($number, $tries);
       $res = $game->makeGuess($guess);
       $_SESSION["tries"] = $game->tries();
    }



    $data = [
        "guess" => "$guess",
        "res" => "$res",
        "tries" => "$tries",
        "number" => "$number",
        "doGuess" => "$doGuess",
        "doCheat" => "$doCheat",
        "readonly" => "$readonly",
    ];


    $app->page->add("guess/debug");
    $app->page->add("guess/play", $data);
    // $app->page->add("guess/debug");

    return $app->page->render([
        "title" => $title,
    ]);
});



/**
* Showing message Hello World, rendered within the standard page layout.
 */
$app->router->get("lek/hello-world-page", function () use ($app) {
    $title = "Hello World as a page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("anax/v2/article/default", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
