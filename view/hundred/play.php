<?php

// namespace Persla\View;

?><h1>Spelet först till hundra</h1>


<!-- <h1>Rolling a dicehand with two dices</h1> -->
<form method="post">
    <input type="submit" name="doRoll" value="Slå">
    <input type="submit" name="doSave"  value="Spara">
    <input type="submit" name="doInit" value="Start om">
</form>
<?php var_dump($doRoll);?>
<?php var_dump($doSave);?>

<?php if ($doRoll || $doSave) :?>
<p>1:a tärningen: <?= $dice1 ?>.</p>
<p>2:a tärningen: <?= $dice2 ?>.</p>
<p>Summa nuvarande runda: <?= $tosum2 ?></p>
<p>Summa total: <?= $tosum1 ?></p>
<?php endif;?>

<pre>
<?=var_dump($_POST)?>
<?=var_dump($_SESSION)?>
</pre>
