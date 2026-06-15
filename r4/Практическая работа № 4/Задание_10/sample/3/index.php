<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP - Задание 10</title>
</head>
<body>
	<h1>Управляющие конструкции</h1>
	<h2>Циклы</h2>
	<hr>
	<h2>Вывод массива (Оптимизация)</h2>
	
	<?php
		require_once 'tracks_data.php';

		$li = "";
		
		// Проходим массив циклом
		if (isset($track) && is_array($track)) {
			foreach ($track as $item) {
				$li .= "<li>(id={$item['id_track']}) " . htmlspecialchars($item['name']) . "</li>";
			}
			echo "<ol>" . $li . "</ol>";
		} else {
			echo "<p>Ошибка: Данные не загружены.</p>";
		}
	?>

</body>
</html>
