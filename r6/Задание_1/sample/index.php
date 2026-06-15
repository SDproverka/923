<?php
//Подключаем файл с массивом
require_once 'team.php';

//функция для  вывода данных массива
function showTeam($arr) {
    foreach ($arr as $item) {
        echo "Группа: {$item['name']} (id = {$item['id_team']})<br/>";
        echo "Страна: {$item['country']}<br />";
        echo "Дата основания: {$item['date']}<br />";
        echo "Стиль: {$item['style']}<br />";
        echo "<hr/>";
        echo "<p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>

    <h1>Управляющие конструкции</h1>
    <h2>Циклы</h2>
    <hr>
    <h2>Вывод массива</h2>

    <?php
    // Вызываем функцию вывода
    showTeam($team);
    ?>

</body>
</html>