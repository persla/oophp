<?php

// namespace Persla\View;

?><h1>Spelet först till hundra</h1>
<?php

$hand = new Persla\Hundred\DiceHand();
//
$hand->roll();

?>
<!-- <h1>Rolling a dicehand with two dices</h1> -->
<form method="post">
    <input type="submit" name="doRoll" value="Slå">
    <input type="submit" name="doSave"  value="Spara">
    <input type="submit" name="doInit" value="Start om">
</form>

<p><?= implode(", ", $hand->values()) ?></p>
<p>Sum is: <?= $hand->sum() ?>.</p>
<p>Average is: <?= $hand->average() ?>.</p>
<!-- <h1>Rolling a dicehand with five dices</h1> -->

<!-- <?= $dice_hand->roll(); ?> -->

<?php
