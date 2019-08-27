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
    $hand = new Persla\Hundred\GameController();
    $handComputer = new Persla\Hundred\GameController();
    $_SESSION["hand"] = $hand;
    $_SESSION["handComputer"] = $handComputer;
    $tosum1 = $_SESSION["tosum1"] ?? null;
    $_SESSION["tosum1"] = null;
    $tosum1 = $_SESSION["tosum1Comp"] ?? null;
    $_SESSION["tosum1Comp"] = null;

    return $app->response->redirect("hundred/play");
});



/**
 * Render the game status .
 */
$app->router->get("hundred/play", function () use ($app) {

    $title = "Play the game";
    $doRoll = $_SESSION["doRoll"] ?? null;
    $doRollComp = $_SESSION["doRollComp"] ?? null;
    $doSave = $_SESSION["doSave"] ?? null;

    $tosum2 = $_SESSION["tosum2"]?? null;
    $tosum1 = $_SESSION["tosum1"] ?? null;
    $tosum2Comp = $_SESSION["tosum2Comp"]?? null;
    $tosum1Comp = $_SESSION["tosum1Comp"] ?? null;

    $dices = $_SESSION["dices"]?? null;
    $dicesComp = $_SESSION["dicesComp"]?? null;

    $hand = $_SESSION["hand"]?? null;
    $handComputer = $_SESSION["handComputer"]?? null;

    $_SESSION["doRoll"] = null;
    $_SESSION["doRollComp"] = null;
    $_SESSION["doSave"] = null;
    $_SESSION["tosum2"] = null;
    $_SESSION["tosum2Comp"] = null;
    $_SESSION["dices"] = null;
    $_SESSION["dicesComp"] = null;


    $data = [
        "doRoll" => $doRoll ?? null,
        "doRollComp" => $doRollComp ?? null,
        "doSave" => $doSave ?? null,
        "hand" => $hand,
        "handComputer" => $handComputer,
        "dices" => $dices ?? null,
        "tosum2" => $tosum2,
        "tosum1" => $tosum1,
        "dicesComp" => $dicesComp ?? null,
        "tosum2Comp" => $tosum2Comp,
        "tosum1Comp" => $tosum1Comp,
        // "saveplayer" => $saveplayer,

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
    $hand = $_SESSION["hand"]?? null;
    $handComputer = $_SESSION["handComputer"] ?? null;
    $doRoll = $_POST["doRoll"] ?? null;
    $doRollComp = $_POST["doRollComp"] ?? null;
    $doSave = $_POST["doSave"] ?? null;
    $_SESSION["tosum2"] = null;
    $_SESSION["tosum2Comp"] = null;
    $doInit = $_POST["doInit"] ?? null;

    if ($doRoll) {
        $_SESSION["doRoll"] = $doRoll;
        $_SESSION["dices"] = $hand->roll();
        $_SESSION["tosum2"] = $hand->totalScoreRound();
    }

    if ($doSave) {
        $_SESSION["doSave"] = $doSave;
        $_SESSION["tosum1"] = $hand->totalScorePlayer();
    }

    if ($doRollComp) {
        $_SESSION["doRollComp"] = $doRollComp;
        $_SESSION["dicesComp"] = $handComputer->roll(6);
        $_SESSION["tosum2Comp"] = $handComputer->totalScoreRound();
        $_SESSION["tosum1Comp"] = $handComputer->totalScorePlayer();
    }
    if ($doInit) {
        return $app->response->redirect("hundred/init");
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
