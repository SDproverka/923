<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Задание 4: Квадратное уравнение</h2>

<?php
if (isset($_GET['a'], $_GET['b'], $_GET['c'])) {
    $a = (float)$_GET['a'];
    $b = (float)$_GET['b'];
    $c = (float)$_GET['c'];

    echo "<p>Уравнение: <b>{$a}x^2 + {$b}x + {$c} = 0</b></p>";

    if ($a == 0) {
        echo "<p>Коэффициент 'a' не может быть равен 0.</p>";
    } else {
        $d = pow($b, 2) - 4 * $a * $c;
        echo "<p>Дискриминант (D) = $d</p>";

        if ($d > 0) {
            $x1 = (-$b + sqrt($d)) / (2 * $a);
            $x2 = (-$b - sqrt($d)) / (2 * $a);
            echo "<p>x1 = $x1 <br> x2 = $x2</p>";
        } elseif ($d == 0) {
            $x = -$b / (2 * $a);
            echo "<p>Корень x = $x</p>";
        } else {
            echo "<p>Действительных корней нет (D < 0).</p>";
        }
    }
} else {
    echo "<p>Пожалуйста, передайте коэффициенты a, b и c через GET-параметры.</p>";
    echo "<p>Пример: <code>?a=1&b=-3&c=2</code></p>";
}
?>

</body>
</html>