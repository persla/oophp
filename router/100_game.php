<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Init game and redirect to play the game.
 */
$app->router->get("hundred/init", function () use ($app) {
    // Init the seiion for the gamestart
    $hand = new Persla\Hundred\DiceHand();
    $_SESSION["hand"] = $hand;
    $tosum1 = $_SESSION["tosum1"] ?? null;
    $_SESSION["tosum1"] = null;

    return $app->response->redirect("hundred/play");
});



/**
 * Render the game status .
 */
$app->router->get("hundred/play", function () use ($app) {
    //echo "Some debugging information";
    $title = "Play the game";
    $doRoll = $_SESSION["doRoll"] ?? null;
    $doSave = $_SESSION["doSave"] ?? null;
    $tosum2 = $_SESSION["tosum2"]?? null;
    $tosum1 = $_SESSION["tosum1"] ?? null;
    $dice1 = $_SESSION["dice1"]?? null;
    $dice2 = $_SESSION["dice2"]?? null;
    $hand = $_SESSION["hand"]?? null;
    $_SESSION["doRoll"] = null;
    $_SESSION["doSave"] = null;
    // $_SESSION["tosum1"] = null;
    $_SESSION["tosum2"] = null;


    $data = [
        "doRoll" => $doRoll ?? null,
        "doSave" => $doSave ?? null,
        "hand" => $hand,
        "dice1" => $dice1,
        "dice2" => $dice2,
        "tosum2" => $tosum2,
        "tosum1" => $tosum1,

        // $dice2 = $_SESSION["dice2"]?? null;
        // "tries" => $tries,


    ];


    // $app->page->add("guess/debug");
    $app->page->add("hundred/play", $data);
    // $app->page->add("guess/debug");
    return $app->page->render([
        "title" => $title,
    ]);
});
/**
 * Make a guess.
 */
$app->router->post("hundred/play", function () use ($app) {
    //echo "Some debugging information";
    // $hand = new Persla\Hundred\DiceHand();
    $hand = $_SESSION["hand"]?? null;
    $title = "Play the game";
    $doRoll = $_POST["doRoll"] ?? null;
    $doSave = $_POST["doSave"] ?? null;

    if ($doRoll) {
        // $hand = new Persla\Hundred\DiceHand();
        // $hand->roll();
        $hand->roll_dice_1();
        $hand->roll_dice_2();
        $_SESSION["doRoll"] = $doRoll;
        $_SESSION["dice1"] = $hand->roll_dice_1();
        $_SESSION["dice2"] = $hand->roll_dice_2();
        $_SESSION["tosum2"] = $hand->total_score_round();

    }
    if ($doSave) {
        $_SESSION["doSave"] = $doSave;
        $_SESSION["tosum1"] = $hand->total_score();
        // $_SESSION["tosum2"] = null;
    }


    return $app->response->redirect("hundred/play");
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
