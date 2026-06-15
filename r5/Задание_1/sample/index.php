<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Функции</h1>
	<h2>Встроенные функции, часть 1</h2>
	
	<?php
		require "teams.php";

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        if (isset($content[$id])) {
            echo "<h3>Информация о группе №$id</h3>";
            echo "<pre>";
            print_r($content[$id]);
            echo "</pre>";
        } else {
            echo "<p>Группа с ID <strong>$id</strong> не найдена.</p>";
        }
    } 
    else {
        echo "<h3>Список всех групп</h3>";
        foreach ($content as $key => $value) {
            echo "<h4>Группа ID: $key</h4>";
            echo "<pre>";
            print_r($value);
            echo "</pre>";
            echo "<hr>";
        }
    }
	?>
	

</body>
</html>