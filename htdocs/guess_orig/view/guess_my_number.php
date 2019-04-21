<h1>Guess my number</h1>
<p>Guess a number between 1 and 100, you have <?= $_SESSION["tries"] ?> left</p>

<form method="post">
    <input type="number" <?= $game->endGame(); ?> name="guess">
    <input type="submit" name="doGuess" <?= $game->endGame(); ?> value="Make a guess">
    <input type="submit" name="doInit" value="Start over">
    <input type="submit" name="doCheat" <?= $game->endGame(); ?> value="Cheat">
</form>

<?php if ($doGuess) :?>
    <p>Your guess <?= $guess ?> is <?= $res ?> </p>
<?php endif;?>

<?php if ($doCheat) :?>
    <p>CHEAT: Current number is <?= $number ?> </p>
<?php endif;?>


<pre>
<!-- <?=var_dump($_POST)?>
<?=var_dump($_SESSION)?> -->
</pre>
