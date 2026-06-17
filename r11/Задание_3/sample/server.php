<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Отправка данных на сервер</h1>
	<h2>Безопасность данных, часть 2</h2>

	<?php
		$_ERROR = [];

		// Получаем логин из POST
		$login = $_POST['login'] ?? '';

		// 1. Проверка на пустоту
		if ($login === '') {
			$_ERROR[] = "Не заполнено поле Логин";
		} else {
			// 2. Санитизация функцией filter_var()
			$login = filter_var($login, FILTER_SANITIZE_SPECIAL_CHARS);
			
			// 3. Валидация: [a-z0-9]{5,10}
			if (!preg_match('/^[a-z0-9]{5,10}$/', $login)) {
				$_ERROR[] = "Логин должен содержать только латинские буквы нижнего регистра и цифры (5-10 символов)";
			}
		}

		// Вывод результата
		if (empty($_ERROR)) {
			echo "<p style='color: green;'>Форма успешно отправлена! Логин: $login</p>";
		} else {
			echo "<p style='color: red;'>Ошибки:</p>";
			echo "<ul>";
			foreach ($_ERROR as $error) {
				echo "<li>$error</li>";
			}
			echo "</ul>";
		}
	?>
	
</body>
</html>