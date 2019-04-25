<?php

namespace Persla\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare classes
?><h1>Guess my number</h1>
<!-- <p>Guess a number between 1 and 100, you have <?= $_SESSION["tries"] ?> left</p> -->
<p>Guess a number between 1 and 100, you have <?= $tries ?> left</p>
<?= var_dump($readonly); ?>
<?= var_dump($tries); ?>
<form method="post">

    <input type="number" <?= $readonly ?> name="guess">
    <input type="submit" name="doGuess" <?= $readonly ?> value="Make a guess">
    <input type="submit" name="doInit" value="Start over">
    <input type="submit" name="doCheat" <?= $readonly ?> value="Cheat">

</form>

<?php if ($doGuess) :?>
    <p>Your guess <?= $guess ?> is <?= $res ?> </p>
<?php endif;?>

<?php if ($doCheat) :?>
    <p>CHEAT: Current number is <?= $number ?> </p>
<?php endif;?>
debug text

<pre>
<!-- <?=var_dump($_POST)?>
<?=var_dump($_SESSION)?> -->
</pre>
