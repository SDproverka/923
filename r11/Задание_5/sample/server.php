<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Безопасность данных, часть 2</h2>
	<hr>
	<h2>Загрузка файлов</h2>

	<?php
		$_ERROR = []; // массив ошибок

		// проверяем поле логин на валидность 
		$login = $_POST['login'] ?? '';
		
		// Проверка на пустоту
		if ($login === '') {
			$_ERROR[] = "Не заполнено поле Логин";
		} else {
			// Санитизация функцией filter_var()
			$login = filter_var($login, FILTER_SANITIZE_SPECIAL_CHARS);
			
			// Валидация: [a-z0-9]{5,10}
			if (!preg_match('/^[a-z0-9]{5,10}$/', $login)) {
				$_ERROR[] = "Логин должен содержать только латинские буквы нижнего регистра и цифры (5-10 символов)";
			}
		}

		// проверяем загрузку на наличие ошибок
		if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] !== UPLOAD_ERR_NO_FILE) {
			
			$file = $_FILES['myfile'];
			
			// Проверка на ошибки загрузки
			if ($file['error'] !== UPLOAD_ERR_OK) {
				switch ($file['error']) {
					case UPLOAD_ERR_INI_SIZE:
					case UPLOAD_ERR_FORM_SIZE:
						$_ERROR[] = "Файл превышает максимальный размер (300 КБ)";
						break;
					case UPLOAD_ERR_PARTIAL:
						$_ERROR[] = "Файл был загружен не полностью";
						break;
					case UPLOAD_ERR_NO_FILE:
						$_ERROR[] = "Файл не выбран";
						break;
					default:
						$_ERROR[] = "Ошибка при загрузке файла";
				}
			}
		} elseif (isset($_POST['load'])) {
			$_ERROR[] = "Файл не выбран";
		}

		// если массив ошибок пуст, проверяем, относится ли файл к разрешенным для загрузки
		if (empty($_ERROR) && isset($_FILES['myfile']) && $_FILES['myfile']['error'] === UPLOAD_ERR_OK) {
			
			$file = $_FILES['myfile'];
			$imageType = exif_imagetype($file['tmp_name']);
			
			// Проверка: является ли файл изображением нужного типа
			if ($imageType === false) {
				$_ERROR[] = "Файл не является изображением";
			} elseif (!in_array($imageType, [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP])) {
				$_ERROR[] = "Недопустимый тип изображения. Разрешены только JPEG, PNG, BMP";
			}
		}

		// если массив ошибок пуст, пытаемся переместить файл в директорию upload
		if (empty($_ERROR) && isset($_FILES['myfile']) && $_FILES['myfile']['error'] === UPLOAD_ERR_OK) {
			
			// Создаем директорию upload, если её нет
			$uploadDir = 'upload/';
			
			// Проверяем существование директории
			if (!is_dir($uploadDir)) {
				// Пытаемся создать директорию
				if (!mkdir($uploadDir, 0777, true)) {
					$_ERROR[] = "Не удалось создать директорию upload";
				}
			}
			
			// Проверяем права на запись
			if (!is_writable($uploadDir)) {
				$_ERROR[] = "Нет прав для записи в директорию upload";
			}
			
			if (empty($_ERROR)) {
				// Генерируем уникальное имя файла
				$extension = '';
				$imageType = exif_imagetype($file['tmp_name']);
				switch ($imageType) {
					case IMAGETYPE_JPEG:
						$extension = '.jpg';
						break;
					case IMAGETYPE_PNG:
						$extension = '.png';
						break;
					case IMAGETYPE_BMP:
						$extension = '.bmp';
						break;
				}
				
				$safeLogin = preg_replace('/[^a-z0-9]/', '', $login);
				$newFileName = $safeLogin . '_' . time() . $extension;
				$destination = $uploadDir . $newFileName;
				
				// Перемещаем файл
				if (move_uploaded_file($file['tmp_name'], $destination)) {
					echo "<p style='color: green; font-weight: bold;'>✅ Файл успешно загружен!</p>";
					echo "<p><strong>Логин:</strong> " . htmlspecialchars($login) . "</p>";
					echo "<p><strong>Имя файла:</strong> " . htmlspecialchars($file['name']) . "</p>";
					echo "<p><strong>Сохранён как:</strong> " . htmlspecialchars($newFileName) . "</p>";
					echo "<p><strong>Размер:</strong> " . round($file['size'] / 1024, 2) . " КБ</p>";
					echo "<p><strong>Путь:</strong> " . htmlspecialchars($destination) . "</p>";
				} else {
					$_ERROR[] = "Не удалось переместить файл в директорию upload";
				}
			}
		}
		
		// Вывод ошибок
		if (!empty($_ERROR)) {
			echo "<p style='color: red; font-weight: bold;'>❌ Ошибки:</p>";
			echo "<ul>";
			foreach ($_ERROR as $error) {
				echo "<li>$error</li>";
			}
			echo "</ul>";
		} elseif (!isset($_FILES['myfile']) || $_FILES['myfile']['error'] === UPLOAD_ERR_NO_FILE) {
			echo "<p>Выберите файл для загрузки</p>";
		}
	?>

</body>
</html>