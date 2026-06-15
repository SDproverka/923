<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Задание 10: Оптимизация</title>
</head>
<body>

	<h1>Управляющие конструкции</h1>

	<h2>Циклы</h2>
	<hr>
	<h2>Вывод массива (Подключен извне)</h2>

	<?php
		// Подключаем внешний файл с массивом
		require_once 'teams_data.php';
		
		// Используем цикл foreach для обхода массива $team
		foreach ($team as $item) {
			echo "
				Группа: {$item['name']} (id = {$item['id_team']})<br/>
				Страна: {$item['country']}<br />
				Дата основания: {$item['date']}<br />
				Стиль: {$item['style']}<br />
				<hr/><p>
				";
		}	
	?>

</body>
</html>
