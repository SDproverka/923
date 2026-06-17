<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Безопасность данных, часть 1</h2>
	
	<?php
		$_ERROR["valid"] = [];
		$_ERROR["empty"] = [];

		// проверяем поле Логин
		$login = trim($_POST['login'] ?? '');
		if ($login === '') {
			$_ERROR["empty"][] = "Не заполнено поле Логин";
		} else {
			$login = htmlspecialchars($login, ENT_QUOTES, 'UTF-8');
			if (!preg_match('/^[a-zA-Z0-9_.-]+$/', $login)) {
				$_ERROR["valid"][] = "Логин содержит недопустимые символы";
			}
		}

		// проверяем поле E-mail
		$email = trim($_POST['email'] ?? '');
		if ($email === '') {
			$_ERROR["empty"][] = "Не заполнено поле E-mail";
		} else {
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$_ERROR["valid"][] = "$email - невалидный адрес";
			}
		}

		// проверяем поле Пароль
		$pwd = trim($_POST['pwd'] ?? '');
		if ($pwd === '') {
			$_ERROR["empty"][] = "Не заполнено поле Пароль";
		} else {
			$pwd = htmlspecialchars($pwd, ENT_QUOTES, 'UTF-8');
			if (strlen($pwd) < 4) {
				$_ERROR["valid"][] = "Пароль должен содержать не менее 4 символов";
			}
		}

		// Вывод результата как на скриншоте
		if (!empty($_ERROR["empty"]) || !empty($_ERROR["valid"])) {
			if (!empty($_ERROR["empty"])) {
				echo "Пустые значения<br>\n";
				foreach ($_ERROR["empty"] as $error) {
					echo "$error<br>\n";
				}
			}
			if (!empty($_ERROR["valid"])) {
				echo "Невалидные значения<br>\n";
				foreach ($_ERROR["valid"] as $error) {
					echo "$error<br>\n";
				}
			}
		} elseif (empty($_ERROR["empty"]) && empty($_ERROR["valid"])) {
			echo "Форма успешно отправлена!";
		}
	?>	

</body>
</html>