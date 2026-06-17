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
		$_ERROR = [];

		// Проверяем, был ли загружен файл
		if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] !== UPLOAD_ERR_NO_FILE) {
			
			$file = $_FILES['myfile'];
			
			// Проверка на ошибки загрузки
			if ($file['error'] !== UPLOAD_ERR_OK) {
				$_ERROR[] = "Ошибка при загрузке файла";
			} else {
				// Получаем тип изображения
				$imageType = exif_imagetype($file['tmp_name']);
				
				// Проверка: должен быть изображением одного из указанных типов
				if ($imageType === false) {
					$_ERROR[] = "Файл не является изображением";
				} elseif (!in_array($imageType, [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP])) {
					$_ERROR[] = "Недопустимый тип изображения. Разрешены только JPEG, PNG, BMP";
				} else {
					// Дополнительная проверка MIME-типа
					$finfo = finfo_open(FILEINFO_MIME_TYPE);
					$mimeType = finfo_file($finfo, $file['tmp_name']);
					finfo_close($finfo);
					
					$allowedMimes = ['image/jpeg', 'image/png', 'image/bmp', 'image/x-ms-bmp'];
					
					if (!in_array($mimeType, $allowedMimes)) {
						$_ERROR[] = "Файл не является изображением допустимого типа";
					}
				}
			}
		} elseif (isset($_POST['load'])) {
			$_ERROR[] = "Файл не выбран";
		}
		
		// Вывод результата
		if (empty($_ERROR) && isset($_FILES['myfile']) && $_FILES['myfile']['error'] !== UPLOAD_ERR_NO_FILE) {
			echo "<p style='color: green; font-weight: bold;'>Файл успешно загружен и прошёл проверку!</p>";
			echo "<p>Имя файла: " . htmlspecialchars($_FILES['myfile']['name']) . "</p>";
			echo "<p>Тип файла: " . htmlspecialchars($_FILES['myfile']['type']) . "</p>";
		} elseif (!empty($_ERROR)) {
			echo "<p style='color: red; font-weight: bold;'>Ошибки:</p>";
			echo "<ul>";
			foreach ($_ERROR as $error) {
				echo "<li>$error</li>";
			}
			echo "</ul>";
		} else {
			echo "<p>Выберите файл для загрузки</p>";
		}
	?>

</body>
</html>