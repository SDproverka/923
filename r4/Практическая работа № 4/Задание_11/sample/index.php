<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Управляющие конструкции</h1>
	<h2>Конструкции</h2>
	
	<?php
		require_once 'personnels.php';

		// Критерий поиска
		$term = "surname";
		$value = "Маркова";
		
		$found = false;

		foreach ($content as $item) {
			if ($item[$term] == $value) {
				$found = true;
				// Вывод данных в строго заданном формате
				echo "id: {$item['id_personnel']} <br />";
				echo "Фамилия: {$item['surname']} <br />";
				echo "Имя: {$item['name']} <br />";
				echo "Отчество: {$item['patronymic']} <br />";
				echo "Должность: {$item['post']} <br />";
				echo "Категория: {$item['category']} <br />";
				echo "Образование: {$item['level_edu']} <br />";
				echo "Стаж работы в ОУ: {$item['experience_total']} <br />";
				echo "<hr />";
			}
		}

		if (!$found) {
			echo "Сотрудник по критерию $value не найден.";
		}
	?>

</body>
</html>
