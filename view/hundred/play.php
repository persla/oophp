<?php
// namespace Persla\View;
$disabled = null;
$disabledcomp = null;
$limit = 100;
?><h1>Spelet först till hundra</h1>

<div>
<h2>
<?php if ($tosum2 !== 0 && !$doSave && $tosum1 <= $limit && $tosum1Comp <= $limit) :?>
Din tur!
<?php else : ?>
    Datorns tur!
    <?php $disabled = "disabled" ?>
<?php endif;?>
<?php if ($tosum1 >= $limit) :?>
    Du vann!
<?php endif;?>
<?php if ($tosum1Comp >= $limit) :?>
    Datorn vann!
<?php endif;?>

</h2>
<form method="post">
    <input type="submit" name="doRoll" <?= $disabled?> value="Slå">
    <input type="submit" name="doSave"  <?= $disabled?> value="Spara">
    <input type="submit" name="doInit"  value="Start om">
</form>

<p>Ditt tärningskast:
<?php if ($doRoll) :?>
    <?php foreach ($dices as $value) : ?>
        <i><?= $value ?> </i>
    <?php endforeach; ?>
<?php endif;?></p>
<p>Summa nuvarande runda: <?= $tosum2 ?></p>
<p>Summa total: <?= $tosum1 ?></p>
</div>


<div>
<h2>Datorn spelare</h2>
<?php if ($doRollComp && $tosum1 <= $limit && $tosum1Comp <= $limit) :?>
    <?php $disabledcomp = "disabled" ?>
<?php endif;?>
<form method="post">
    <input type="submit" name="doRollComp" <?= $disabledcomp?> value="Slå">
</form>
<div>

<p>Datorns tärningskast:
<?php if ($doRollComp) :?>
    <?php foreach ($dicesComp as $value) : ?>
        <i><?= $value ?> </i>
    <?php endforeach; ?>
<?php endif;?></p>
<p>Summa nuvarande runda: <?= $tosum2Comp ?></p>
<p>Summa total: <?= $tosum1Comp ?></p>
</div>


<!-- <?php var_dump($doRoll);?>
<?php var_dump($doSave);?> -->



<pre>
<!-- <?=var_dump($_POST)?> -->
<?=var_dump($_SESSION)?>
</pre>
