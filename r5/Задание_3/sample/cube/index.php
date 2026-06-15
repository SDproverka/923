<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    $count = 5; 
    $diceResults = [];
    $totalSum = 0;

    for ($i = 0; $i < $count; $i++) {
        $value = rand(1, 6);
        $diceResults[] = $value; 
        $totalSum += $value;  
    }

    echo "<h3>Выпало кубиков: $count</h3>";
    echo "<p>Сумма набранных очков: <strong>$totalSum</strong></p>";
?>

<div class="dice-container" style="display: flex; flex-wrap: wrap;">
    <?php
        foreach ($diceResults as $dice) {
            echo "<img src='{$dice}.jpg' alt='{$dice}' width='80' style='margin: 5px; border: 1px solid #000;'>";
        }
    ?>
</div>

</div>

</body>
</html>