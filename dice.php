<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <title>Diceroller</title>
    </head>
    <body>

<?php

$dices = array(4, 6, 8, 10, 12, 20, 100);

$dice = isset($_GET['dice']) ? $_GET['dice'] : 6;

$nr = isset($_GET['nr']) ? $_GET['nr'] : null;

$ob = isset($_GET['ob']) ? true : false;

$sumDice = isset($_GET['sum']) ? true : false;

if (!is_null($nr)) {
    $sum = 0;

    $diceToRoll = $nr;
    while ($diceToRoll > 0) {
        $roll = rand(1, $dice);
        $diceToRoll--;
        if ($ob && $roll == $dice) {
            $diceToRoll += 2;
            echo "<span>$roll</span> ";
        } else {
            $sumDice ? $sum += $roll : null;
            echo $roll . " ";
        }
    }

    if ($sumDice) {
        echo " = $sum";
    }
}



function selectOptions($diceTypes, $selectedDice)
{
    foreach ($diceTypes as $dT) {
        echo "<option";
        if ($dT == $selectedDice) {
            echo " selected=\"selected\"";
        }
        echo ">$dT";
    }
}

function checkedBox($checked)
{
    if ($checked) {
        echo " checked=\"checked\"";
    }
}



 ?>
    <form>
        <p><label>Sidor:
            <select class="diceSelect" name="dice" size="1">
                <? selectOptions($dices, $dice)?>
            </select>
        </label>
        <p><label>Antal: <input type="number" name="nr" value=<?=$nr?> min="1" max="15"></label>
        <p><label>Obegränsad: <input type="checkbox" name="ob"<? checkedBox($ob)?>></label>
        <p><label>Summera: <input type="checkbox" name="sum"<? checkedBox($sumDice)?>></label>
        <p><input type="submit" value="Rulla">
    </form>

    </body>
</html>
