<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php
    $c1 = rand(1, 6);
    $c2 = rand(1, 6);
    $c3 = rand(1, 6);

    $sum = $c1 + $c2 + $c3;
?>

<h3>Поздравляем!</h3>
<p>Неимоверными усилиями вам удалось набрать <?php echo $sum; ?> баллов!</p>

<div class="dice-box">
    <?php
        $dir = 'cube/'; 

        echo '<img src="' . $dir . $c1 . '.jpg" width="100" style="margin: 5px; border: 1px solid #ccc;">';
        echo '<img src="' . $dir . $c2 . '.jpg" width="100" style="margin: 5px; border: 1px solid #ccc;">';
        echo '<img src="' . $dir . $c3 . '.jpg" width="100" style="margin: 5px; border: 1px solid #ccc;">';
    ?>
</div>

</body>
</html>